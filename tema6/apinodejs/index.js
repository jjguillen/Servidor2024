const app = require("./app");
const port = 3000;
const mongoose = require("mongoose");
const urlMongo = "mongodb://root:toor@localhost:27017/apitask?authSource=admin";
//const urlMongo = "mongodb://root:toor@mongodb:27017/apitask?authSource=admin";

mongoose.connect(urlMongo);

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})