from Crypto.Util.number import *
from sympy import nextprime
import random

flag = b'NTk1Nzc0NmE2NDQ3NTk3OTRlNTg3NDRkNGU0NjRhNDg0ZDMxMzgzMDU0NmQ1MjY2NTU2YTUyNGY1YTQ0NDI0ZTU4N2E0NTMxNTg3YTY0NDk1MjU2Mzk3MjRkMzE2YzM5NDk0NjQxNzY1NTdhNmY2NzU0NDUzOTUwNTM3OTQyNDI1NjQzNDI1NTUzNDU1NTY3NTI2YjM5NTM1NDU1NDY1NQ=='

p = getPrime(1024)
q = nextprime(p//2)
n = p * q
e = 65537
m = bytes_to_long(flag)
c = pow(m, e, n)

with open("output.txt", "w") as f:
    f.write(f"n = {n}\n")
    f.write(f"e = {e}\n")
    f.write(f"c = {c}\n")