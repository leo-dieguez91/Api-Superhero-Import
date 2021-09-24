# Api-Superhero-Import
# PHP Laravel Exercise

### Installation guide

1. Clone the repo:
2. Once you cloned the repository, you will need to create a MySQL database
3. Setup the `exercise/.env` file
4. Execute the command: `sh scripts/install.sh`

El .sh lo modifique, le agregue la importación, con crear la base de datos y ejecutar el sh ya tenemos los datos del .csv en la db.

Para ver la información se puede ver por /api/superheros ... se le agrego filtro por fullName,publisher o race.
Ordena por id y fullName. Y también esta paginado. Todos los filtros se envían por GET
