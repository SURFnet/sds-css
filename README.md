## How to use this repo

Run from the command line in the htdocs folder of this rep:

    php -S localhost:8000

Then visit the URL in a browser.
The used php version is 8.

Css compiling is done with gulp (https://gulpjs.com/).
Make sure to use the correct node-version (lts/fermium) when running gulp. This can be done with nvm (https://github.com/nvm-sh/nvm).
Run "npm ci" to make sure the correct package versions will be used, from "package-lock.json".

### How to build
nvm use
npm run install
