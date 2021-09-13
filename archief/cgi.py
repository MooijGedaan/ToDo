#!/usr/bin/python3

import datetime

# Print HTTP header
print("Content-type: text/plain\n")

# Dynamic body
print("Een python CGI script")
print(datetime.datetime.now())

# done
print("Einde script")
