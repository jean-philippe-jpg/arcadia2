const mongoose = require('mongoose');

const connectDB = async () => {

    try{


        mongoose.set('strict', false);
        mongoose.connect()
    } catch{

    }
}