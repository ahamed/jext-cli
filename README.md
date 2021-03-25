# JEXT-CLI

![wideGif](https://user-images.githubusercontent.com/5783354/112375177-2e8cc200-8d0d-11eb-825e-4f9d9560eee9.gif)

<meta name="google-site-verification" content="PjAZuQwSJ3Tk5az36jsf8h_NAuxESseEDfqn1oaA-zc" />

**JEXT-CLI** is a command line application for creating Joomla! 4 component using just a simple command. This tool will help you to reduce your job for creating a component. It will provide you a boilerplate for Joomla! 4 component.

Author: Sajeeb Ahamed (sajeeb07ahamemd@gmail.com)

Tags: #joomla, #joomla-component-builder, #joomla-extension-builder, #jext-cli, #php-cli, #cli, #components, #extensions.


# Installation
The installation processes are too easy. You can install it from the source code.

### Prerequisite
You need to `PHP CLI` and `composer` are installed in your machine before proceeding next steps.

**Note: These processes are only for Linux and macOs. For Windows these may not work.**

#### Steps:
1. Clone the repository using git `git clone https://github.com/ahamed/jext-cli.git` **or** [Download Zip](https://github.com/ahamed/jext-cli/archive/v1.0.0-beta.1.zip) from github.
2. Extract the zip file.
3. Go to the directory, run `cd jext-cli`
4. Install project dependencies, run `composer install`
5. Regenerate the class lists for auto loading, run `composer dump-autoload -o`
6. Run `chmod +x install.sh` for making the `install.sh` file executable.
7. Run `./install.sh`, it will ask for the password just type your password and hit enter.

If no error happens then you are done installing the `jext-cli` tool. Now you can use it globally by your command terminal.

# Usage
This tool is only for Joomla! 4. So you need to-
1. [Download](https://www.joomla.org/announcements/release-news/5833-joomla-4-0-0-beta7-and-joomla-3-10-alpha5.html) and Install Joomla 4. (Currently Joomla in version 4.0.0-beta.7)
2. Go to the Joomla! project's root directory, run `cd path/to/the/project/root`
3. Run `jext-cli --version`, if it shows you the version message then the `jext-cli` is installed correctly in your machine.

### Creating a new Joomla! component:
#### Syntax
```shell
jext-cli [--component|-c] <name>
```

+ For creating a new Joomla! 4 component just run `jext-cli --component <name>`. Here the `<name>` would be replaced by your component name and the name should be without `com_` prefix. If you add the `com_` prefix then don't worry, it will be sanitized.

+ After that you will be asking for-
   + **Author name** (What is the name of the component author. If skip `jext-cli` will take the current username as author name.)

   + **Author Email** (The email address of the component author. If skip then it will be empty.)
   + **Author Url** (The author website url, If skip then it will be empty.)
   + **Description** (The component description. If skip then it will be empty.)
   + **Copyright** (Copyright information, default `(C) {year}, {Author name}`.)
   + **License** (Component license information, default `MIT`)
   + **Version** (Component initial version number, default `1.0.0`)
   + **Namespace** (The component's namespace, default `Joomla\Component\<ComponentName>`. Using the default is recommended.)
   + **Do you confirm component creation?** (Hit enter if everything is okay. If not then type `no` and hit enter.)

   Congratulation! You have successfully created your first Joomla! 4 component using `jext-cli` tool.
+ Now login as administrator to your Joomla! project.
+ Go to `System > Discover`
+ Here you find your newly created component name. Select it and click `Install` from the toolbar button.
+ Go to administrator `sidebar > expand Components > <ComponentName>`

**Note:** By default `jext-cli --component <name>` command creates a component with two default views. One for creating `Notes` and another for showing the list of `Icomoon` icons with live search facilities. If you don't want these views then add a flag `--no-sample-view` with the create command. So the command would be `jext-cli --component <name> --no-sample-view`

**Note: I recommend you to add the required views first before discovering and installing the component. Because if you add all the views and then go to Discover and install the component then you will get all the views as the submenu to the left sidebar. Otherwise you have to populate the database for making submenus.**

### Creating a view to a component:
You can also create a view to a component. One view comes with all the respective `Controller`, `Model` and `View` files.

#### Syntax:
```shell
jext-cli --view [-f|--front [-b|--back [-bt|--both]]]
```
The third argument is optional. If you skip it then the view is generated for the backend/administrator. If you want the view for frontend then the third argument would be `-f` or `--front`. You can also create a view for both frontend and backend. For that use the third argument as `-bt` or `--both`.

#### Available commands
1. `jext-cli --view` - for creating a view for the administrator part.
2. `jext-cli --view -b|--back` - same as command 1.
3. `jext-cli --view -f|--front` - for creating a view for the frontend.
4. `jext-cli --view -bt|--both` - for creating a view for both of the administrator or frontend.

This command will ask you for some information.
- [required] **Component Name** (The component name where to put the view)
- [required] **View name (Singular)** (The singular name of the view)
- [optional] **View name (Plural)** (The plural name of the view. The `jext-cli` will predict the plural name from the singular name. If you thing the prediction is correct then hit enter, otherwise enter the plural name.)

Congratulations! You have successfully generated a view.

**Note**: The `jext-cli` assumes that each and every view has a database table. The table name it predicts like- `#__<componentName>_<pluralViewName>`. So check the `administrator/components/<com_componentName>/sql/install.mysql.utf8.sql` file, there your get the sql queries for creating tables. Open your mysql client and create the table to the database.

___For more information run `jext-cli --help` or `jext-cli -h` or just `jext-cli` and hit enter.___

# Contribution
For contribution-
1. Fork the repository.
2. Clone the forked repository to your local machine.
3. Create a new branch from the `main` branch, e.g. `git checkout -b new_branch`. [Note never work at main if you plan to contribute. Never means never.]
4. Commit your changes and push to your remote.
5. Make a pull request (PR) to this repository.

# Test
Currently `phpcs` testing is integrated. If you interested and make a PR then first make sure that you pass the test of `phpcs`. Testing this is simple, just run-

```console
composer run-script phpcs
```

# Support
If you get any problems then raise an issue [here](https://github.com/ahamed/jext-cli/issues) or send me at [sajeeb07ahamed@gmail.com](mailto:sajeeb07ahamed@gmail.com) but first option is preferable.
