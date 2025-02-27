import os
import subprocess
import shutil

def run_command(command):
    try:
        subprocess.run(command, shell=True, check=True)
        print(f"✅ Comando eseguito: {' '.join(command)}")
    except subprocess.CalledProcessError as e:
        print(f"❌ Errore eseguendo {' '.join(command)}: {e}")

def clear_laravel_cache():
    commands = [
        "php artisan cache:clear",
        "php artisan config:clear",
        "php artisan route:clear",
        "php artisan view:clear",
        "php artisan config:cache",
        "php artisan route:cache",
        "php artisan view:cache"
    ]
    for cmd in commands:
        run_command(cmd)

def fix_storage_permissions():
    storage_path = "storage/framework/views"
    if not os.path.exists(storage_path):
        os.makedirs(storage_path, exist_ok=True)
        print("✅ Cartella storage/framework/views ricreata.")

    run_command("chmod -R 777 storage bootstrap/cache")

def update_composer():
    run_command("composer install")
    run_command("composer update")
    run_command("composer dump-autoload")

def main():
    print("🔄 Avvio della procedura di ripristino di Laravel...")
    clear_laravel_cache()
    fix_storage_permissions()
    update_composer()
    print("✅ Ripristino completato! Prova a eseguire 'php artisan serve'")

if __name__ == "__main__":
    main()
