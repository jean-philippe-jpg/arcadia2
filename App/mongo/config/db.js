
const mongoose = require('mongoose');
const dotenv = require('dotenv').config();


const connectDB = async () => {

try {
     mongoose.set('strictQuery', false); 
       
    mongoose.connect(process.env.MONGO_URI, ()=> 
        console.log("MongoDB connected")
    );


} catch (error) {
    console.error(error.message);
    process.exit(1); // Stop the app if there is an error
}

}

module.exports = connectDB;



