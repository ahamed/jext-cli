# JEXT-CLI
This is the cli tool for creating Joomla component using terminal.

```php
_________   _______              _________         _______    _         _________
\__    _/  (  ____ \  |\     /|  \__   __/        (  ____ \  ( \        \__   __/
   )  (    | (    \/  ( \   / )     ) (           | (    \/  | (           ) (   
   |  |    | (__       \ (_) /      | |   _____   | |        | |           | |   
   |  |    |  __)       ) _ (       | |  (_____)  | |        | |           | |   
   |  |    | (         / ( ) \      | |           | |        | |           | |   
|\_)  )    | (____/\  ( /   \ )     | |           | (____/\  | (____/\  ___) (___
(____/     (_______/  |/     \|     )_(           (_______/  (_______/  \_______/ 
```

# Installation
The installation processes are quit easy. You can install it from the source code.
#### Prerequisite
You need to `PHP CLI` and `composer` are installed in your machine before proceeding next steps.

#### Steps:
1. Clone the repository using git `git clone https://github.com/ahamed/jext-cli.git` **or** [Download Zip](https://github.com/ahamed/jext-cli/archive/main.zip) from github and extract.

2. Go to the directory, run `cd jext-cli`
3. Install project dependencies, run `composer install`
4. Regenerate the class maps, run `composer dump-autoload -o`
5. Run `chmod +x install.sh` for making the `install.sh` file executable.
6. Run `./install.sh`, it will ask for the password just type your password and hit return.

# Usage
This tool is only for Joomla 4. So you need to-
1. [Download](https://www.joomla.org/announcements/release-news/5833-joomla-4-0-0-beta7-and-joomla-3-10-alpha5.html) and Install Joomla 4. (Currently Joomla in version 4.0.0-beta.7)
2. Go to the Joomla! project's root directory, run `cd path/to/the/project/root`
3. Run `jext-cli --version`, if it shows you the version message then the `jext-cli` is installed correctly in your machine.

### Creating a new Joomla! component:
#### Syntax
```shell
jext-cli [--component|-c] <name>
```
+ For creating a new Joomla! 4 component just run `jext-cli --component <name>`. Here the `<name>` would be replaced by your component name and the name should be without `com_` prefix.

+ After that you will be asking for-
   + **Author name** (What is the name of the component author. If skip `jext-cli` will take the current username as author name.)
   + **Author Email** (The email address of the component author. If skip then it will be empty.)
   + **Author Url** (The author website url, If skip then it will be empty.)
   + **Description** (The component description. If skip then it will be empty.)
   + **Copyright** (Copyright information, default `(C) Year, Author name`.)
   + **License** (Component license information, default `MIT`)
   + **Version** (Component initial version number, default `1.0.0`)
   + **Namespace** (The component's namespace, default `Joomla\Component\<ComponentName>`. We recommend to skip as default.)
   + **Do you confirm component creation?** (Hit return if everything is okay. If not then type `no` and hit return.)

   Congratulation! You have successfully created your first Joomla! 4 component using `jext-cli` tool.
+ Now login as administrator to your Joomla! project.
+ Go to `System > Discover`
+ Here you find your newly created component name. Select it and click `Install` from the toolbar button.
+ Go to administrator `sidebar > expand Components > <ComponentName>`

**Note:** By default `jext-cli --component <name>` command creates a component with two default views. One for creating `Notes` and another for showing the list of `Icomoon` icons with live search facilities.

### Creating a view to a component:
You can also create a view to a component.

#### Syntax:
```shell
jext-cli --view [-f|--front [-b|--back [-bt|--both]]]
```
The third argument is optional. If you skip it then the view is generated for backend/administrator. If you want the view for frontend then the third argument would be `-f` or `--front`.
You can also create a view for both frontend and backend. For that use the third argument as `-bt` or `--both`.

This command will as you for some information.
* **Component Name** (The component name where to put the view)
* **View name (Singular)** (The singular name of the view)
* **View name (Plural)** (The plural name of the view. The `jext-cli` will predict the plural name from the singular name. If you thing the prediction is correct then hit return, otherwise enter the plural name.)

Congratulations! You have successfully generated a view.

**Note** The `jext-cli` assumes that each and every view has a database table. The table name it predicts like- `#__<component_name>_<plural_view_name>`. So check the `administrator/components/<com_component_name>/sql/install.mysql.utf8.sql` file, there your get a table creation sql for the view. Open your mysql client and add the table to the database.

For more information run `jext-cli --help`