import "../css/app.css";
import "./bootstrap";

import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createApp, h } from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import "./icons";
import { Icon } from "@iconify/vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import Antd from "ant-design-vue";
import "ant-design-vue/dist/reset.css";
import UserLayout from "./Layouts/UserLayout.vue";
const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        if (window.location.pathname.startsWith("/admin")) {
            page.default.layout = AdminLayout;
            return page;
        }
        if (page && page.default && page.default.layout === undefined) {
            page.default.layout = UserLayout;
        }
        return page;
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Antd)
            .component("font-awesome-icon", FontAwesomeIcon)
            .component("Icon", Icon)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
