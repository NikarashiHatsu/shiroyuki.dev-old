require('./bootstrap');

import React from 'react';
import { render } from 'react-dom';
import { createInertiaApp } from '@inertiajs/inertia-react';
import { InertiaProgress } from '@inertiajs/progress';
import { initializeApp } from 'firebase/app';
import { getAnalytics } from "firebase/analytics";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
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

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}`),
    setup({ el, App, props }) {
        return render(<App {...props} />, el);
    },
});

InertiaProgress.init({
    delay: 250,
    color: '#ef4444',
    includeCSS: true,
    showSpinner: false,
});