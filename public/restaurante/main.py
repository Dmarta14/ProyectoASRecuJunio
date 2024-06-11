import mysql.connector
import time
import random

def obtenerComandas():
    entrantes = ["Ensalada César","Gazpacho andaluz","Sopa de mariscos","Pulpo a la gallega","Tortilla de bacalao","Ensalada mixta","Patatas bravas","Calamares a la romana","Pimientos de Padrón","Croquetas de jamón","Huevos rotos","Salmorejo","Mejillones al vapor","Boquerones en vinagre","Queso manchego"]
    segundos_platos = ["Chuleta de cordero","Merluza a la plancha","Paella de marisco","Pollo al ajillo","Entrecot de ternera","Bacalao a la vizcaína","Costillas BBQ","Filete de ternera","Lubina al horno","Cochinillo asado","Pato a la naranja","Hamburguesa gourmet","Solomillo de cerdo","Rabo de toro","Pulpo a la brasa"]
    primerPlato = random.choice(entrantes)
    segundoPlato = random.choice(segundos_platos)
    mesa = random.randint(1, 12)
    return primerPlato, segundoPlato, mesa
def crearComandas(primerPlato, segundoPlato,nMesa):
    

    datos = {
        'dbname': 'RestauranteDiegoMarta',
        'user': 'DiegoMartaAS',
        'password': '@nOOD23dwdjk92@dmos!mcidcndsdc',
        'host': 'db-mysql',  # Cambia esto al servidor de tu base de datos
        'port': '3306'  # Puerto por defecto de MySQL
    }

    # Crear una conexión a la base de datos
    conn = mysql.connector.connect(
        host=datos['host'],
        user=datos['user'],
        password=datos['password'],
        database=datos['dbname'],
        port=datos['port']
    )

    cursor = conn.cursor()
    
    platoNumeroUno = primerPlato 
    platoNumeroDos = segundoPlato
    mesa = nMesa
    query = "INSERT INTO comandas (primerPlato, segundoPlato, nMesa) VALUES (%s, %s, %s)"
    values = (platoNumeroUno, platoNumeroDos, mesa)
    cursor.execute(query, values)
    conn.commit()
    cursor.close()
    conn.close()

if __name__ == '__main__':
    while True:
        time.sleep(60)
        primerPlato, segundoPlato, nMesa= obtenerComandas()
        crearComandas(primerPlato, segundoPlato, nMesa)