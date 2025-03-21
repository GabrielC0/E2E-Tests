const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
    specPattern: "cypress/integration/**/*.spec.{js,jsx,ts,tsx}",
    setupNodeEvents(on, config) {},
  },
});
