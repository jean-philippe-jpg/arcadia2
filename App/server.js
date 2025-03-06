
const express = require('express');
const port = 5000

const app = express();

//middleware qui traite les données de request//
app.use(express.json());
app.use(express.urlencoded({extended: false}));


app.use("/post", require('./routes/post.routes'));

app.listen(port, () => console.log(`Server is running on port ${port}`));