const mongoose = require('mongoose');

const connectDB = async () => {

    try{

        mongoose.set('strictQuery', false);
        mongoose.connect(process.env.MONGO_URI, () => console.log('connected to db'));

    } catch (error) {
        console.error(error);
        process.exit();
    }
};

module.exports = connectDB;