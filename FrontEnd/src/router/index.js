import Vue from "vue";
import Router from 'vue-router';

const originalPush = Router.prototype.push;
Router.prototype.push = function push(location) {
  return originalPush.call(this, location).catch(err => err);
};

Vue.use(Router);

const router = new Router({
  mode: 'history',
  base: "/",
  routes: [
    {
      path: '',
      component: () => import('../components/Navigation'),
      children: [
        {
          path: "/login",
          name: "Login",
          component: () => import('../views/Login'),
          meta: { guestOnly: true }
        },
        {
          path: "/registro",
          name: "Registro",
          component: () => import('../views/Registro'),
          meta: { guestOnly: true }
        },
        {
          path: "/",
          name: "Inicio",
          component: () => import('../views/Inicio'),
          meta: { authOnly: true }
        },
        {
          path: '/Nivel1',
          name: 'nivel1',
          component: () => import('../views/Nivel1'),
        },
        {
          path: '/Nivel2',
          name: 'nivel2',
          component: () => import('../views/Nivel2'),
          meta: { authOnly: true }
        },
        {
          path: '/Nivel3',
          name: 'nivel3',
          component: () => import('../views/Nivel3'),
          meta: { authOnly: true }
        },
        {
          path: '/Nivel4',
          name: 'nivel4',
          component: () => import('../views/Nivel4'),
          meta: { authOnly: true }
        },
        {
          path: '/Prolife',
          name: 'Prolife',
          component: () => import('../views/Prolife'),
          meta: { authOnly: true }
        },
        {
          path: '/Restablecer',
          name: 'Restablecer',
          component: () => import('../views/Restablecer'),
          meta: { authOnly: true }
        }
      ]
    }
  ]
});

function isLoggedIn() {
  return localStorage.getItem("token");
}

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.authOnly)) {
    if (!isLoggedIn()) {
      next({
        path: "/login",
        query: { redirect: to.fullPath }
      });
    } else {
      next();
    }
  } else if (to.matched.some(record => record.meta.guestOnly)) {
    if (isLoggedIn()) {
      next({
        path: "/",
        query: { redirect: to.fullPath }
      });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router;
