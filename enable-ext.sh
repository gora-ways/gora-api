docker exec -it ttr_postgres psql -U sppms_user -d sppms_db -c "CREATE EXTENSION IF NOT EXISTS postgis;"
docker exec -it ttr_postgres psql -U sppms_user -d sppms_db -c "CREATE EXTENSION IF NOT EXISTS pgcrypto;"
