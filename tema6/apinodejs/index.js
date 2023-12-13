const app = require("./app");
const port = 3000;
const mongoose = require("mongoose");
const urlMongo = "mongodb://root:toor@localhost:27018/apitask?authSource=admin";

mongoose.connect(urlMongo);

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})