#!/bin/bash

if [ ! -d ~/.jext-cli  ]
then
	mkdir ~/.jext-cli
fi

# Copy the project files to the include directory.
cp -r * ~/.jext-cli

if [ -L /usr/local/bin/jext-cli ]
then
	sudo rm /usr/local/bin/jext-cli
fi

sudo ln -s ~/.jext-cli/bin/jext-cli /usr/local/bin/jext-cli

tput setaf 2; echo "Installation Completed Successfully!: "$1; tput sgr0;
tput setaf 3; echo "Welcome to Jext-CLI: "$1; tput sgr0;
echo "You are using: "
jext-cli --version
tput setaf 2; echo "You can perform these operations: "$1; tput sgr0;
jext-cli --help