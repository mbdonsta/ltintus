import "./bootstrap";

import { createApp } from "vue";
import UrlShortener from "./components/UrlShortener.vue";

const app = createApp({
    components: {
        UrlShortener,
    },
});

app.component("url-shortener", UrlShortener);
app.mount("#app");
