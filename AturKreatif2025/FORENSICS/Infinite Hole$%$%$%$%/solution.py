import zipfile
import glob
import os
import sys

# Password for all the zips
password = b'keepunzippingbuddy'  # Must be bytes, not string

# Check if hole1.zip exists before starting
if not os.path.exists('hole1.zip'):
    print("❗ Error: 'hole1.zip' not found.")
    print("👉 Please make sure 'hole1.zip' is in the same directory as this script.")
    sys.exit(1)

# Start auto-unzipping
while True:
    zip_files = glob.glob('hole*.zip')
    
    if not zip_files:
        print("✅ No more ZIP files. All extracted!")
        break
    
    zip_files.sort()  # Always pick the first hole (hole1, hole2, etc.)
    current_zip = zip_files[0]
    
    print(f"📦 Extracting {current_zip}...")
    
    with zipfile.ZipFile(current_zip, 'r') as zf:
        try:
            zf.extractall(pwd=password)
        except RuntimeError:
            print(f"❌ Failed to extract {current_zip}. Wrong password?")
            break
    
    os.remove(current_zip)

print("🎉 Done! Flag should be here!")
