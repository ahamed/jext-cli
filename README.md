# JEXT-CLI

![wideGif](https://user-images.githubusercontent.com/5783354/112375177-2e8cc200-8d0d-11eb-825e-4f9d9560eee9.gif)

<meta name="google-site-verification" content="PjAZuQwSJ3Tk5az36jsf8h_NAuxESseEDfqn1oaA-zc" />

**JEXT-CLI** is a command-line application for creating Joomla! 4 components using just a simple command. This tool will help you to reduce your job for creating a component. It will provide you a boilerplate for Joomla! 4 component.


# Installation
The installation process is too easy. You can install it from the source code.

### Prerequisites
You need `PHP CLI`, and `composer` are installed in your machine before proceeding next steps.

**Note: These processes are only for Linux and macOS. For Windows, these may not work. If you can implement the installation in a Windows machine, please share the idea.**

#### Steps:
1. Clone the repository using git `git clone https://github.com/ahamed/jext-cli.git` **or** [Download Zip](https://github.com/ahamed/jext-cli/archive/v1.0.0-beta.1.zip) from github.
2. Extract the zip file.
3. Go to the directory, run `cd jext-cli`
4. Install project dependencies, run `composer install`
5. Regenerate the class lists for auto-loading, run `composer dump-autoload -o`
6. Run `chmod +x install.sh` for making the `install.sh` file executable.
7. Run `./install.sh`, it will ask for the password, just type your password and hit enter.

If no error happens, then you are done installing the `jext-cli` tool. Now you can use it globally by using a terminal.

# Usage
This tool is only for Joomla! 4. So you need to-
1. [Download](https://downloads.joomla.org) and Install Joomla 4.
2. Go to the Joomla! project's root directory, run `cd path/to/the/project/root`
3. Run `jext-cli --version`, if it shows you the version message, then the `jext-cli` is installed correctly in your machine.

### Creating a new Joomla! component:
#### Syntax
```shell
jext-cli --component|-c <name>
```

+ For creating a new Joomla! 4 component just run `jext-cli --component <name>`. Here the `<name>` would be replaced by your component name, and the name should be without `com_` prefix. If you add the `com_` prefix, then don't worry, this will be sanitized.

+ After that you will be asking for-
   + **Author name** (What is the name of the component author. If skip `jext-cli` will take the current username as the author name.)
   + **Author Email** (The email address of the component author. If skip then it will be empty.)
   + **Author Url** (The author website url, If skip then it will be empty.)
   + **Description** (The component description. If skip then it will be empty.)
   + **Copyright** (Copyright information, default `(C) {year}, {Author name}`.)
   + **License** (Component license information, default `MIT`)
   + **Version** (Component initial version number, default `1.0.0`)
   + **Namespace** (The component's namespace, default `Joomla\Component\<ComponentName>`. Using the default is recommended.)
   + **Do you confirm component creation?** (Hit enter if everything is okay. If not then type `no` and hit enter.)

Congratulation! You have successfully created your first Joomla! 4 component using `jext-cli` tool.
By default `jext-cli --component <name>` command creates a component with two default views. One for creating `Notes` and another for showing the list of `Icomoon` icons with live search facilities. If you don't want these views then add a flag `--no-sample-view` with the create command. So the command would be `jext-cli --component <name> --no-sample-view`
### Creating a view to the component:
You can also add a view to the component. A view comes with all the required `Model`, `Controller` and `View` files.

#### Syntax:
```shell
jext-cli --view [-f|--front [-b|--back [-bt|--both]]]
```
The third argument is optional. If you skip it, then the view is generated for the backend/administrator. If you want the view for the frontend then the third argument would be `-f` or `--front`. You can also create a view for both frontend and backend. For that use the third argument as `-bt` or `--both`.

#### Available commands
1. `jext-cli --view` - for creating a view for the administrator part.
2. `jext-cli --view -b|--back` - same as command 1.
3. `jext-cli --view -f|--front` - for creating a view for the frontend.
4. `jext-cli --view -bt|--both` - for creating a view for both of the administrator or frontend.

This command will ask you for some information.
- [required] **Component Name** (The component name where to put the view)
- [required] **View name (Singular)** (The singular name of the view)
- [optional] **View name (Plural)** (The plural name of the view. The `jext-cli` will predict the plural name from the singular name. If you think the prediction is correct then hit enter, otherwise enter the plural name and hit enter.)

Congratulations! You have successfully generated a view.
Using these commands create all the views you've required.

Now it's time to check our component. We have to install the component first.
For installing the component-
1. Login as a super user to the administrator panel.
2. Go to `Settings > Discover`
3. Select the component to install and click the `Install` button from the toolbar.
4. The component is installed. For checking this go to the `Component` menu from the left sidebar.

__Note: If you install the component after adding all the views,
 then all the database tables related with the views will be installed along with
 the component. Also you can find the views as the submenu of the component. But if you add any view
 after installing the component, then you have to create a database table associate with the view.
 The jext-cli tool assumes that every view has a database table. For getting the table
 definition check the install.sql file inside the administrator component folder of the component.__

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
