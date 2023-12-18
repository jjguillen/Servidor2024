const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const UserSchema = Schema({
    name: {
        type: String,
        require: false,
    },
    lastName: {
        type: String,
        require: false,
    },
    email: {
        type: String,
        require: true,
        unique: true,
    },
    password: {
        type: String,
        require: true
    },
    avatar: {
        type: String,
        require: false
    }
});

module.exports = mongoose.model("User", UserSchema);
