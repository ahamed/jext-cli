<meta name="google-site-verification" content="PjAZuQwSJ3Tk5az36jsf8h_NAuxESseEDfqn1oaA-zc" />

**JEXT-CLI** is a command line application for creating Joomla! 4 component using just a simple command. This tool will help you to reduce your job for creating a component. It will provide you a boilerplate for Joomla! 4 component.

Author: Sajeeb Ahamed (sajeeb07ahamemd@gmail.com)

Tags: #joomla, #joomla-component-builder, #joomla-extension-builder, #jext-cli, #php-cli, #cli, #components, #extensions.

Hello, all the Joomla extension developers. Today I am going to share with you a nice CLI application for generating Joomla! 4 components. So, tie your belt, and let's start the journey.

The stable version of Joomla! 4 is going to release very soon. And as it is a major release so there are some major changes that may break your existing extensions. So it would be hard for the developers to upgrade the extensions from Joomla! 3 to 4.
Now in this statement, you may disagree with me that upgrading from 3 to 4 is not that much hard. If one already makes compatible his/her extension for `3.9.x` then it's easy. I also agree with you. But Joomla! 4 brings a newly organized component structure for you. What if you want to taste the original flavor? You need to do more.

So, in this situation, I am here to introduce you to a new CLI application. The application helps you to create a component by just running a simple command in the terminal. This will provide you a boilerplate of a structured Joomla! 4 component. 

By using this you can create a new component and also brings your business logic from your existing components after creating a new component (as J4 still provides you MVC structure).

Here the question is how to use it? It's quite easy. Just follow me-

> For using the `jext-cli` you need **php-cli** and **composer** installed in your machine. The installation is written for Linux & Mac users. For Windows users, this is not going to work.

### Installation
1. Clone the Github repository `git clone https://github.com/ahamed/jext-cli.git`
2. Navigate to the directory, `cd jext-cli`
3. Install the project dependencies, `composer install`
4. Update the auto-loading classes, `composer dump-autoload -o`
5. Install the CLI tool, `./install.sh` (for macOS & Linux)
6. Check if the tool is installed, `jext-cli --help`

If you find the manuscript that means the `jext-cli` is installed on your machine globally.

### Usage
You can create components and views for a component now. For creating a component first navigate to your Joomla! 4 project root directory, `cd path/to/your/project/root`, then run-

```console
jext-cli --component|-c <component_name>
```
Here, `--component|-c` means any of `--component` or `-c`, and the `<component_name>` is the name of your component. Please don't use a multi-word name as a component name.

This command will ask for some basic meta-information. They are-
   + **Author name** (What is the name of the component author. If skip `jext-cli` will take the current username as author name.)

   + **Author Email** (The email address of the component author. If skip then it will be empty.)
   + **Author Url** (The author website url, If skip then it will be empty.)
   + **Description** (The component description. If skip then it will be empty.)
   + **Copyright** (Copyright information, default `(C) {year}, {Author name}`.)
   + **License** (Component license information, default `MIT`)
   + **Version** (Component initial version number, default `1.0.0`)
   + **Namespace** (The component's namespace, default `Joomla\Component\<ComponentName>`. Using the default is recommended.)
   + **Do you confirm component creation?** (Hit enter if everything is okay. If not then type `no` and hit enter.)

Fill them up correctly and this will create the component.

_By default, the **JEXT-CLI** creates a component with two sample views. If you don't want to create the views with the component then use `--no-sample-view` flag with it. For example-_

```console
jext-cli --component <component_name> --no-sample-view
```

Here you successfully created your component. Now we know all components have one or more views. The views are categorized into two types. Administrator view and site view. Here the administrator views are called `back` views,  and the site views are called `front` views. For creating a view, the command is-

```console
jext-cli --view [--back|-b, [--front|-f, [--both|-bt]]]
```

Here, the  `[--back|-b, [--front|-f, [--both|-bt]]]` means any of the six options. If I describe the options, then they are-

- `--back|-b` means either `--back` or `-b` which stands for the back view or the administrator view.
- `--front|-f` means either `--front` or `-f` which stands for the front view or the site view.
- `--both|-bt` means either `--both` or `-bt` stands for both administrator and site views.

After running any of the commands the application asks you the component name. This indicates for which component you are going to create a view.

After putting the valid component name the system will ask you for the view's names. You have to enter two names for a view. One is the singular name and another is the plural name. The `JEXT-CLI` can predict the plural name after you entering the singular name. If you think the prediction is correct then just hit enter otherwise, enter the plural name. That's all for creating a view. All the related (controller, model, view) files are created for you. This also injects the required language strings, SQL queries, and other required codes for making the view functional.

Your view is created. You can create as many views as you need. After creating all the views log in as `administrator` to the project then go to `Settings > Discover`. There you can see the component waits for you to install. Select the component and click the `Install` button from the toolbar.

Hurra! the component has been installed. Now from the sidebar, go to `Components > Your component`. Here you get your views.