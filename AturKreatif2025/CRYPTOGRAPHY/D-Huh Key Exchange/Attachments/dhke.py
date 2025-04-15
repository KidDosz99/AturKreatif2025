from Crypto.Util.number import getPrime
from hashlib import sha1
import random

p = getPrime(72)
g = 2

a = random.randint(2, p-2)
b = random.randint(2, p-2)

A = pow(g, a, p)
B = pow(g, b, p)

s = pow(B, a, p)
flag = "AKCTF25{" + sha1(str(s).encode()).hexdigest()[:15] + "}"

with open("output.txt", "w") as f:
    f.write(f"p = {p}\n")
    f.write(f"g = {g}\n")
    f.write(f"A = {A}\n")
    f.write(f"B = {B}\n")
    