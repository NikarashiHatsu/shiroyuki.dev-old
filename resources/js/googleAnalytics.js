import { initializeApp } from 'firebase/app';
import { getAnalytics } from "firebase/analytics";

const firebaseConfig = {
    apiKey: "AIzaSyADnNR4R3w3SJUr_FmnV01caif2fizhqxs",
    authDomain: "shiroyuki-dev.firebaseapp.com",
    projectId: "shiroyuki-dev",
    storageBucket: "shiroyuki-dev.appspot.com",
    messagingSenderId: "17647753783",
    appId: "1:17647753783:web:d80ca4d3023e73b2bbbdb2",
    measurementId: "G-CRCH9872R4"
};
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);