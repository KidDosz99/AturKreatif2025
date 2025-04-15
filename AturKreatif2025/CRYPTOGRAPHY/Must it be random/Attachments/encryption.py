from Crypto.Util.number import *
from sympy import nextprime

flag = b'REDACTED'

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