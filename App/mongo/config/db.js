
const mongoose = require('mongoose');
//const dotenv = require('dotenv').config();




const connectDB = async () => {

try {
     mongoose.set('strictQuery', false); 
       
   /*mongoose.connect('mongodb+srv://arcadia:ORJ4KUzjgSAip0ub@cluster0.fgnbb.mongodb.net', ()=> 
        console.log("MongoDB connected")
    );*/

    mongoose.connect('mongodb+srv://arcadia:cHampion85@cluster0.fgnbb.mongodb.net')
    .then(() => console.log('MongoDB connected')
    );

} catch (error) {
    console.error(error.message);
    process.exit(1); // Stop the app if there is an error
}

}

module.exports = connectDB;



