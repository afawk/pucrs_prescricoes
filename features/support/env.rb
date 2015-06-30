require 'capybara/poltergeist'
require 'capybara/cucumber'
require 'sequel'

require 'active_support/all'

driver = ENV.fetch('JS_DRIVER', 'selenium').to_sym

Capybara.current_driver    = driver
Capybara.default_driver    = driver
Capybara.javascript_driver = driver
Capybara.run_server        = false

if ENV['HEROKU_APP_NAME']
  $conn_string = `heroku config:get DATABASE_URL --app #{ENV['HEROKU_APP_NAME']}`.chomp
  exit $?.exitstatus if $?.exitstatus != 0

  Capybara.app_host = "http://#{ENV['HEROKU_APP_NAME']}.herokuapp.com"

else
  $conn_string = 'postgres://postgres:postgres@localhost:5432/prescricoes_medicas-features'
  Capybara.app_host = 'http://localhost:8081'
end

PrescricoesDB = Sequel.connect($conn_string)
