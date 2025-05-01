const express = require('express');
const router = express.Router();


router.get("/", (req, res) => {
    res.json({ message: "recuperation des données " });
});

router.post("/", (req, res) => {
    console.log(req.body);
    res.json({ message: req.body.message });
});


router.put("/:id", (req, res) => {
    //console.log(req.body);
    res.json({ messageId: req.params.id });
});

router.delete("/:id", (req, res) => {
    //console.log(req.body);
    res.json({ messageId: "message supprimé de l\'id:" + req.params.id });
});

router.patch("/like/:id", (req, res) => {
    //console.log(req.body);
    res.json({ messageId: "l'animal" + req.params.id+"à été liké" });
});

router.patch("/dislike/:id", (req, res) => {
    //console.log(req.body);
    res.json({ messageId: "le like de l'animals" + req.params.id+"a été supprimé" });
});


module.exports = router;