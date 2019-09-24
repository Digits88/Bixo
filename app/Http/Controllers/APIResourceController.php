<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Litepie\User\Traits\RoutesAndGuards;

class APIResourceController extends BaseController
{
    use RoutesAndGuards;

    /**
     * Initialize public controller.
     *
     * @return null
     */
    public function __construct(Request $request = null)
    {
        $guard = request()->guard;
        guard($guard . '.api');
        $this->middleware('auth:' . $guard . '.api');
        $this->middleware('role:' . $guard);
    }

    /**
     * Show dashboard for each user.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request, String $part = null)
    {
        $datas = [];
        $datas['me'] = $request->user();
        $datas = array_merge($datas, $this->getJson());
        if (is_null($part)) {
            $data = $datas;
        } else {
            $data = array_get($datas, $part);
        }
        $request = $request->all();
        return compact('data', 'request');
    }

    public function getJson()
    {
        return \json_decode('{
    "user": {
        "id": 1,
        "name": "Gene Newman",
        "email": "genenewman@gmail.com",
        "token": "token-dsfdssdfjsdfkjo@dfijsdf9sdfkndfsj",
        "status": "user--online",
        "image": "/img/user/01.png",
        "username": "gene_newman"
    },
    "users": [
        {
            "id": 1,
            "name": "Gene Newman",
            "status": "user--online",
            "image": "/img/user/01.png",
            "username": "gene_newman"
        },
        {
            "id": 2,
            "name": "Billy Black",
            "status": "user--online",
            "image": "/img/user/02.png",
            "username": "billyblack"
        },
        {
            "id": 3,
            "name": "Herbert Diaz",
            "status": "user--online",
            "image": "/img/user/03.png",
            "username": "herbert"
        },
        {
            "id": 4,
            "name": "Sylvia Harvey",
            "status": "user--busy",
            "image": "/img/user/04.png",
            "username": "sylvia"
        },
        {
            "id": 5,
            "name": "Marsha Hoffman",
            "status": "user--busy",
            "image": "/img/user/05.png",
            "username": "m_hoffman"
        },
        {
            "id": 6,
            "name": "Mason Grant",
            "status": "user--offline",
            "image": "/img/user/06.png",
            "username": "masongrant"
        },
        {
            "id": 7,
            "name": "Shelly Sullivan",
            "status": "user--offline",
            "image": "/img/user/02.png",
            "username": "shelly"
        }
    ],
    "messages": [
        {
            "userId": 1,
            "user": "Dyloz",
            "mine": true,
            "url": "#",
            "src": "/img/user/03.png",
            "message": "Epic Cheeseburgers come in all kind of styles."
        },
        {
            "userId": 1,
            "user": "Dyloz",
            "mine": false,
            "url": "#",
            "src": "/img/user/01.png",
            "message": "Cheeseburgers make your knees weak."
        },
        {
            "userId": 1,
            "user": "Dyloz",
            "mine": true,
            "url": "#",
            "src": "/img/user/05.png",
            "message": "Cheeseburgers will never let you down."
        },
        {
            "userId": 2,
            "mine": true,
            "url": "#",
            "src": "/img/user/01.png",
            "message": "A great cheeseburger is a gastronomical event."
        },
        {
            "userId": 1,
            "user": "Dyloz",
            "mine": false,
            "url": "#",
            "src": "/img/user/05.png",
            "message": "There\'s a cheesy incarnation waiting for you no matter what you palete preferences are."
        },
        {
            "userId": 1,
            "user": "Dyloz",
            "mine": true,
            "url": "#",
            "src": "/img/user/01.png",
            "message": "If you are a vegan, we are sorry for you loss."
        }
    ],
    "company": {
        "navs": [
            {
                "url": "#",
                "icon": "icon-home",
                "name": " Home"
            },
            {
                "url": "#",
                "icon": "icon-support",
                "name": " Help"
            },
            {
                "url": "#",
                "icon": "icon-user",
                "name": "Sign Up / Sign In"
            }
        ],
        "info": {
            "name": "Driven Properties LLC.",
            "url": "#",
            "logo": "img/driven-properties-logo-i.png"
        },
        "social": [
            {
                "url": "#",
                "icon": "fa fa-facebook-square"
            },
            {
                "url": "#",
                "icon": "fa fa-twitter"
            },
            {
                "url": "#",
                "icon": "fa fa-urledin"
            },
            {
                "url": "#",
                "icon": "fa fa-instagram"
            }
        ]
    },
    "modules": [
        {
            "id": 1,
            "userId": 1,
            "favourite": true,
            "icon": "icon-chart",
            "url": "/",
            "name": "Dashboard"
        },
        {
            "id": 2,
            "userId": 1,
            "favourite": true,
            "icon": "icon-game-controller",
            "url": "listings",
            "name": "Listings"
        },
        {
            "id": 3,
            "userId": 1,
            "favourite": true,
            "icon": "icon-envelope",
            "url": "sales",
            "name": "Sales"
        },
        {
            "id": 4,
            "userId": 1,
            "favourite": true,
            "icon": "icon-people",
            "url": "works",
            "name": "Work"
        },
        {
            "id": 5,
            "userId": 1,
            "favourite": false,
            "icon": "icon-basket-loaded",
            "url": "#",
            "name": "Deals"
        },
        {
            "id": 6,
            "userId": 1,
            "favourite": true,
            "icon": "icon-handbag",
            "url": "#",
            "name": "Conveyancing"
        },
        {
            "id": 7,
            "userId": 1,
            "favourite": true,
            "icon": "icon-list",
            "url": "#",
            "name": "Accounting"
        },
        {
            "id": 8,
            "userId": 1,
            "favourite": false,
            "icon": "icon-docs",
            "url": "#",
            "name": "HR"
        },
        {
            "id": 9,
            "userId": 1,
            "favourite": false,
            "icon": "icon-bubbles",
            "url": "#",
            "name": "Chats"
        },
        {
            "id": 10,
            "userId": 1,
            "favourite": true,
            "icon": "icon-notebook",
            "url": "#",
            "name": "Contacts"
        },
        {
            "id": 11,
            "userId": 1,
            "favourite": false,
            "icon": "icon-layers",
            "url": "#",
            "name": "Blocks"
        },
        {
            "id": 12,
            "userId": 1,
            "favourite": false,
            "icon": "icon-calendar",
            "url": "#",
            "name": "Events"
        },
        {
            "id": 13,
            "userId": 1,
            "favourite": false,
            "icon": "icon-bell",
            "url": "#",
            "name": "Notifications"
        },
        {
            "id": 14,
            "userId": 1,
            "favourite": true,
            "icon": "icon-pie-chart",
            "url": "#",
            "name": "Reports"
        },
        {
            "id": 15,
            "userId": 1,
            "favourite": false,
            "icon": "icon-directions",
            "url": "#",
            "name": "Tasks"
        },
        {
            "id": 16,
            "userId": 1,
            "favourite": true,
            "icon": "icon-note",
            "url": "#",
            "name": "Blogs"
        },
        {
            "id": 17,
            "userId": 1,
            "favourite": false,
            "icon": "icon-settings",
            "url": "#",
            "name": "Settings"
        },
        {
            "id": 18,
            "userId": 1,
            "favourite": false,
            "icon": "icon-arrow-right-circle",
            "url": "#",
            "name": "More"
        }
    ],
    "notifications": [
        {
            "url": "#",
            "icon": "icon-check",
            "title": "Invitation accepted",
            "summary": "Your have been Invited ..."
        },
        {
            "url": "#",
            "pic": "img/user/1.jpg",
            "title": "Steve Smith",
            "summary": "I slowly updated projects"
        },
        {
            "url": "#",
            "icon": "icon-calendar",
            "title": "To Do",
            "summary": "Meeting with Nathan on Friday 8 AM ..."
        }
    ],
    "menu": [
        {
            "moduleId": 1,
            "url": "/listings",
            "name": "Sales"
        },
        {
            "moduleId": 1,
            "url": "#",
            "name": "Rental"
        },
        {
            "moduleId": 1,
            "url": "#",
            "name": "Price Index"
        },
        {
            "moduleId": 1,
            "url": "#",
            "name": "Hot Properties"
        },
        {
            "moduleId": 1,
            "url": "#",
            "name": "Reports"
        },
        {
            "moduleId": 3,
            "url": "#",
            "name": "Calendar",
            "sub": [
                {
                    "moduleId": 3,
                    "url": "#",
                    "name": "Listing"
                },
                {
                    "moduleId": 3,
                    "url": "#",
                    "name": "Search"
                }
            ]
        },
        {
            "moduleId": 3,
            "url": "#",
            "name": "Calls"
        },
        {
            "moduleId": 3,
            "url": "#",
            "name": "Meeting"
        },
        {
            "moduleId": 3,
            "url": "#",
            "name": "Tasks"
        },
        {
            "moduleId": 2,
            "url": "#",
            "name": "Accounts"
        },
        {
            "moduleId": 2,
            "url": "#",
            "name": "Contacts"
        },
        {
            "moduleId": 2,
            "url": "#",
            "name": "Leads"
        },
        {
            "moduleId": 2,
            "url": "#",
            "name": "Oppertunities"
        }
    ],
    "items": [
        {
            "id": 1,
            "beds": 40,
            "baths": 5,
            "bua": 1200,
            "title": "Dickerson",
            "location": "Loc",
            "sub-location": "Subloc",
            "property": "Prop",
            "price": "100",
            "rent": "200",
            "frequency": "Daily",
            "status": "New"
        },
        {
            "id": 2,
            "bua": 21,
            "title": "Larsen",
            "location": "Shaw",
            "status": "Open"
        },
        {
            "id": 3,
            "bua": 89,
            "title": "Geneva",
            "location": "Wilson",
            "status": "New"
        },
        {
            "id": 4,
            "bua": 38,
            "title": "Jami",
            "location": "Carney",
            "status": "Closed"
        }
    ]
    }', true);
    }
}
