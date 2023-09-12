import {createRouter, createWebHistory} from 'vue-router'
import FacultyCreateView from "@/views/faculties/FacultyCreateView.vue";
import FacultiesListView from "@/views/faculties/FacultiesListView.vue";
import Dashboard from "@/views/Dashboard.vue";
import LoginView from "@/views/auth/LoginView.vue";

const routes = [
    {
        path: '/login',
        name: 'login',
        component: LoginView
    },
    {
        path: '/admin',
        name: 'admin',
        component: Dashboard,
        children: [
            {
                path: 'faculties',
                component: FacultiesListView,
            },
            {
                path: 'faculties/create',
                component: FacultyCreateView,
            },
        ],
    }
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

export default router;


