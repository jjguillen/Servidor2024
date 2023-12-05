const app = require("./app");
const port = 3000;
const mongoose = require("mongoose");
const urlMongo = "mongodb://root:toor@localhost:27018/apitareas";

mongoose.connect(urlMongo,
  {
    useUnifiedTopology: true
  });

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})