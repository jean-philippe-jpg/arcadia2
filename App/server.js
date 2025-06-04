const express = require("express");
const connectDB = require('./mongo/config/db');
const dotenv = require('dotenv').config();
const port = 5000;

connectDB();
const app = express();

//middelware permetant de traiter les données de ma requète

app.use(express.json());
app.use(express.urlencoded({ extended: false }));

////app.use("/post", require("./mongo/routes_express/post.route"));
app.listen(port, () => console.log(`le serveur a démarrer au port ${port}`));