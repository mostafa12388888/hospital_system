import axios from "axios";
import Echo from "laravel-echo";
import Pusher from "pusher-js";
import Alpine from "alpinejs";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.Pusher = Pusher;
window.Echo = new Echo({
  broadcaster: "pusher",
  key: "1bd2a275ed09f106940e",
  cluster: "mt1",
  forceTLS: true
});
const app = "";
window.Alpine = Alpine;
Alpine.start();
