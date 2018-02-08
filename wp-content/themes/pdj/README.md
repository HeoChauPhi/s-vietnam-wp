#FFW Styleguide Template

##Getting started

###Prerequisites:
The FFW Styleguide has a few dependencies that you will need to install to use it. Don't worry, we're got all the link you need right here:

* [Node.js](https://nodejs.org/en/) – The backbone of the framework. Node Package Manager takes care of installing all the dev dependencies,
* [Bower](http://bower.io/) – Bower manages all the front end packages and fetches them for, when we start a new project.
* [Gulp](http://gulpjs.com/) – Task manager and automation. Gulp is responsible for running all the small tasks like compiling SCSS and Twig templates, starting a web server and automatically reloading browsers.

###Starting a new project
So you got the prerequisites installed, and you're ready to get started? Great! Just follow the simple steps below:


1. Download a copy of the framework

2. Open up the project folder in Terminal.

3. Navigate to the .npm folder:

    ```
    cd dist/.npm
    ```

4. Install all the required packages and libraries with Node Package Manager

    ```
    npm install
    ```

5. For just compile style:

    ```
    gulp sass-prod
    ```

6. Initialize the project with Gulp:

    ```
    gulp
    ```

## How to create a new component
1. Navigate to the `styleguide/components` folder
2. Create a new twig file: `component_name.twig`
3. Open file `data/global.json`, find array `list_components` then add this code into it

    ```
      {
        "id":"taskId",
        "name":"component_name",
        "title": "Component Title",
        "group":"basic",
        "hidecode":true
      }
   ```

_Note*_


    id: ID of taks on jira. (option)
    name: Same as file name. *require
    title: Set title display for component. (option)
    group: Group of component: basic/helper/component. *require
    hidecode: Hide showcode button. (option)


Make sure `gulp` is runing.


# s-vietnam-polymer

// Framework and Workflow for adminstrastion

I. Content Type
1. Feature Banner
2. Testimonial
3. Block Add
4. Custom Block
5. Pages

II. Adminstration
1. Page login
2. Drag and Drop
3. Update contents: hotel, tour, fly ticker, article, User.
  3.1. Zoho APIKey field
  3.2. Select each Content Types want update
4. Create and delete pages
  4.1. Save with each json files
  4.2. Drag and Drop block into layouts
5. Create and delete Feature banner
6. Create and delete Testimonial
7. Create and delete Block Add
8. Create and delete Custom Blocks

III. Menu Dashboard
1. Dashboard Intro
2. Pages
3. Content Types
  3.1. Hotels
  3.2. Tours
  3.3. Fly Ticker
  3.4. Article
4. Order
5. Zoho Setting
6. Payment Setting
7. Setting
  7.1. Logo
  7.2. Site Name
  7.3. Site Slogan
  7.4. Home Page

IV. Nav Admin
1. Home page icon
2. Swich Dashboard
3. Add new
4. Hello User
