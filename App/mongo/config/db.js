
const mongoose = require('mongoose');
//const dotenv = require('dotenv').config();
const dotenv  = require('dotenv');
dotenv.config();







const connectDB = async () => {

try {
   await  mongoose.set('strictQuery', false); 
       
   mongoose.connect('mongodb://localhost:27017',
        console.log("MongoDB connecté")
    );

    //mongoose.connect('mongodb://localhot:27017')
    //.then(() => console.log('MongoDB connecté')
    //);

} catch (error) {
    console.error(error.message);
    process.exit(1); // Stop the app if there is an error
}

}

/*async function connectDB() {
    await mongoose.connect( 'mongodb://localhost:27017', {
       //await mongoose.connect(process.env.MONGO_URI, {
        //useNewUrlParser: true,
        //useUnifiedTopology: true,
       //useCreateIndex: true
    });

    console.log('MongoDB connected');
}*/
    

connectDB().catch(err => {
    console.error('MongoDB connection error:', err);
    process.exit(1); // Stop the app if there is an error
});


module.exports = connectDB;



