
const mongoose = require('mongoose');
//const dotenv = require('dotenv').config();
const dotenv  = require('dotenv');
dotenv.config();







/*const connectDB = async () => {

try {
   await  mongoose.set('strictQuery', false); 
       
   /*mongoose.connect('mongodb+srv://arcadia:ORJ4KUzjgSAip0ub@cluster0.fgnbb.mongodb.net', ()=> 
        console.log("MongoDB connected")
    );

    mongoose.connect(process.env.MONGO_URI)
    .then(() => console.log('MongoDB connected')
    );

} catch (error) {
    console.error(error.message);
    process.exit(1); // Stop the app if there is an error
}

}*/

async function connectDB() {
    await mongoose.connect('mongodb+srv://jphilippechampion:jphilippechampion@cluster0.5ayfjly.mongodb.net/arcadia_db?retryWrites=true&w=majority&appName=Cluster0',{
       //await mongoose.connect(process.env.MONGO_URI, {
        //useNewUrlParser: true,
        //useUnifiedTopology: true,
       //useCreateIndex: true
    });

    console.log('MongoDB connected');
}
    

connectDB().catch(err => {
    console.error('MongoDB connection error:', err);
    process.exit(1); // Stop the app if there is an error
});


module.exports = connectDB;



