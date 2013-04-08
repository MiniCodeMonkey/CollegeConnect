#
# Cookbook Name:: misc
# Recipe:: db
#
# Credits: David Stanley (https://github.com/davidstanley01/vagrant-chef/)
#
# All rights reserved - Do Not Redistribute
#

# Create database if it doesn't exist
ruby_block "create_#{node['misc']['name']}_db" do
    block do
        %x[mysql -uroot -p#{node['mysql']['server_root_password']} -e "CREATE DATABASE #{node['misc']['db_name']};"]
    end 
    not_if "mysql -uroot -p#{node['mysql']['server_root_password']} -e \"SHOW DATABASES LIKE '#{node['misc']['db_name']}'\" | grep #{node['misc']['db_name']}";
    action :create
end

# Create app user if it doesn't exist, and give permissions to access database
ruby_block "add_localhost_#{node['misc']['name']}_permissions" do
    block do
        %x[mysql -u root -p#{node['mysql']['server_root_password']} -e "GRANT ALL \
          ON #{node['misc']['db_name']}.* TO '#{node['misc']['db_user']}'@'localhost' IDENTIFIED BY '#{node['misc']['db_pass']}';"]
    end
    not_if "mysql -u root -p#{node['mysql']['server_root_password']} -e \"SELECT user, host FROM mysql.user\" | \
        grep #{node['misc']['db_user']} | grep localhost"
    action :create
end

# Load default database if database dump file existing and database is empty
if File.exist?("#{node['misc']['db_dir']}/dev_structure.sql")
    ruby_block "seed #{node['misc']['name']} database" do
        block do
            %x[mysql -u root -p#{node['mysql']['server_root_password']} #{node['misc']['db_name']} < #{node['misc']['db_dir']}/dev_structure.sql]
            
            # Load content if the dev_content.sql file exists
            if File.exist?("#{node['misc']['db_dir']}/dev_content.sql")
                %x[mysql -u root -p#{node['mysql']['server_root_password']} #{node['misc']['db_name']} < #{node['misc']['db_dir']}/dev_content.sql]
            end
        end
        not_if "mysql -u root -p#{node['mysql']['server_root_password']} -e \"SHOW TABLES FROM #{node['misc']['db_name']}\" | \
            grep 1"
        action :create
    end
end