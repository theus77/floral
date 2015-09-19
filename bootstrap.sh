#!/usr/bin/env bash
#EOL => LF

echo "\n--- Start provisionning script ---\n"


echo "\n--- Install compass ---\n"
export PATH="$HOME/.rbenv/bin:$PATH"
eval "$(rbenv init -)"
export PATH="$HOME/.rbenv/plugins/ruby-build/bin:$PATH"
export PATH="$HOME/.rbenv/bin:$PATH"
eval "$(rbenv init -)"
export PATH="$HOME/.rbenv/plugins/ruby-build/bin:$PATH"
gem install compass
gem install compass-magick

cd /var/www/public/

echo "\n--- Composer (Load cakePHP, ApertureConnector, ...) ---\n"
composer update


echo "\n--- Bower (Bootstrap, CKEditor, jquery, ...) ---\n"
bower update


echo "\n--- Provisionning done ---\n"