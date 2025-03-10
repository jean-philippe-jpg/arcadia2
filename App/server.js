
const express = require('express');
const connectDB = require('./config/db');
const dotenv = require("dotenv").config();
const port = 5000

//connexion à la base de données//
connectDB();
const app = express();

//middleware qui traite les données de request//
app.use(express.json());
app.use(express.urlencoded({extended: false}));


app.use("/post", require('./routes/post.routes'));

app.listen(port, () => console.log(`Server is running on port ${port}`));