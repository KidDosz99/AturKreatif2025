flag = "AKCTF25{fl0w3rs_4l50_k33p_7he_71me}"

flowers = ["Passion Flower", "Carnation", "Squill", "Pyrethrum", "Purple Hawkweed", "Catchfly", "Evening Primrose", "White Lychnis", "Pimpernel", "Field Marigold", "Alpine Dandelion", "Star of Bethlehem"]

def to_flowers(text):
    pairs = [(ord(char) // 12, ord(char) % 12) for char in text]
    return [f"{flowers[q]}, {flowers[r]}" for q, r in pairs]

if __name__ == "__main__":
    enc_flag = to_flowers(flag)
    with open("output.txt", "w") as f:
        f.write("\n".join(enc_flag))