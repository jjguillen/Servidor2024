const mongoose = require("mongoose");

const Schema = mongoose.Schema;

const AtaqueSchema = Schema({
    nombre: {
        type: String,
        require: true
    }, 
    daño: {
        type: Number,
        require: true
    }
});

const TaskSchema = Schema({

    title: {
        type: String,
        require: true
    },
    description: {
        type: String,
        require: true
    },
    completed: {
        type: Boolean,
        require: true,
        default: false
    },
    created_at: {
        type: Date,
        require: true,
        default: Date.now
    },
    temas: [String],
    ataques: [AtaqueSchema]
});

module.exports = mongoose.model("Task", TaskSchema);