const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require('mongoose');
const app = express();

app.use(bodyParser.json());
mongoose.connect('mongodb+srv://tBerck:nCVJJWFVvcXY3Eu@backendwebapiziekenhuis.nntgq2f.mongodb.net/?retryWrites=true&w=majority', {useNewUrlParser: true});

const Patient = mongoose.model('Patient', {firstName: String, lastName: String, birthDate: Date, insuranceNumber: {type: Number, unique: true}, created_at: {type: Date, default: Date.now}}); //TODO: moet insuranceNumber nog unique maken

app.post('/patients', (req, res) => {
    const patient = new Patient(req.body);
    patient.save()
        .then(()=> res.status(200).send(product))
        .catch(err => res.status(400).send(err));
});
app.get('/patients', (req, res)=> {
    Patient.find()
        .then(patients => res.send(patients))
        .catch(err => res.status(400).send(err));
});
app.get('/patients/:insuranceNumber', (req, res)=> {
    Patient.findOne({insuranceNumber: req.params.insuranceNumber})
        .then(patient => {
            if(!patient) {
                return res.status(404).send();
            }
            res.send(patient);
        })
        .catch(err => res.status(400).send(err));
});
app.patch('/patients/:insuranceNumber', (req, res) => {
    Patient.findOneAndUpdate({insuranceNumber: req.params.insuranceNumber}, req.body, {new: true})
        .then(patient => {
            if(!patient) {
                return res.status(404).send();
            }
            res.send(patient);
        })
        .catch(err=>res.status(400).send(err));
});
app.delete('/patients/:insuranceNumber', (req, res) => {
    Patient.findOneAndDelete({insuranceNumber: req.params.insuranceNumber})
        .then(patient => {
            if(!patient) {
                return res.status(404).send();
            }
            res.send('Patient has been deleted from the database: ' + patient);
        })
        .catch(err => res.status(400).send(err));
});

app.listen(3000, ()=> {
    console.log('The Hospital API is listening on port 3000!');
});