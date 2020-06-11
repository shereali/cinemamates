import Home from '../components/frontend/Home'
import Single from '../components/frontend/Single'
import SignUp from '../components/frontend/SignUp'
import SignIn from '../components/frontend/SignIn'
import CreateFilm from '../components/frontend/CreateFilm'

let routesFrontend = [
    {
        name: 'Home',
        path: '/',
        component: Home
    },
    {
        path: '/movie/:slug',
        component: Single
    },
    {
        path: '/signin',
        component: SignIn
    },
    {
        path: '/signup',
        component: SignUp
    },
    {
        path: '/create-film',
        component: CreateFilm,
        meta: {
            auth: true
        },
    }
]


export default routesFrontend