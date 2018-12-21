-- Generado por Oracle SQL Developer Data Modeler 18.2.0.179.0806
--   en:        2018-12-20 18:28:56 CST
--   sitio:      Oracle Database 11g
--   tipo:      Oracle Database 11g



CREATE TABLE capacitaciones (
    id                   INTEGER NOT NULL,
    curso                VARCHAR2(255) NOT NULL,
    institucion          VARCHAR2(255) NOT NULL,
    fecha_finalizacion   DATE NOT NULL,
    persona_id           INTEGER NOT NULL,
    created_at           TIMESTAMP,
    updated_at           TIMESTAMP,
    deleted_at           TIMESTAMP,
    personas_id          INTEGER NOT NULL
);

ALTER TABLE capacitaciones ADD CONSTRAINT capacitaciones_pk PRIMARY KEY ( id );

CREATE TABLE carreras (
    id           INTEGER NOT NULL,
    carrera      VARCHAR2(255) NOT NULL,
    grados_id    INTEGER NOT NULL,
    created_at   TIMESTAMP,
    updated_at   TIMESTAMP,
    deleted_at   TIMESTAMP
);

ALTER TABLE carreras ADD CONSTRAINT carreras_pk PRIMARY KEY ( id );

CREATE TABLE categorias (
    id           INTEGER NOT NULL,
    categoria    VARCHAR2(255) NOT NULL,
    created_at   TIMESTAMP,
    updated_at   TIMESTAMP,
    deleted_at   TIMESTAMP
);

ALTER TABLE categorias ADD CONSTRAINT categorias_pk PRIMARY KEY ( id );

CREATE TABLE clientes (
    id            INTEGER NOT NULL,
    telefono      VARCHAR2(9) NOT NULL,
    correo        VARCHAR2(255) NOT NULL,
    direccion     VARCHAR2(255),
    persona_id    INTEGER NOT NULL,
    created_at    TIMESTAMP,
    updated_at    TIMESTAMP,
    deleted_at    TIMESTAMP,
    personas_id   INTEGER NOT NULL
);

ALTER TABLE clientes ADD CONSTRAINT clientes_pk PRIMARY KEY ( id );

CREATE TABLE compras (
    id               INTEGER NOT NULL,
    serie_factura    VARCHAR2(45),
    numero_factura   VARCHAR2(45) NOT NULL,
    fecha_factura    DATE NOT NULL,
    total            NUMBER NOT NULL,
    proveedores_id   INTEGER NOT NULL,
    forma_pagos_id   INTEGER NOT NULL
);

ALTER TABLE compras ADD CONSTRAINT compras_pk PRIMARY KEY ( id );

CREATE TABLE contactos (
    id            INTEGER NOT NULL,
    contacto      VARCHAR2(255) NOT NULL,
    medios_id     INTEGER NOT NULL,
    created_at    TIMESTAMP,
    updated_at    TIMESTAMP,
    deleted_at    TIMESTAMP,
    personas_id   INTEGER NOT NULL
);

ALTER TABLE contactos ADD CONSTRAINT contactos_pk PRIMARY KEY ( id );

CREATE TABLE cuenta_por_cobrar (
    id             INTEGER NOT NULL,
    dias_credito   INTEGER,
    fecha_pago     DATE,
    ventas_id      INTEGER NOT NULL,
    clientes_id    INTEGER NOT NULL
);

CREATE TABLE cuenta_por_pagar (
    id               INTEGER NOT NULL,
    dias_credito     INTEGER,
    fecha_pago       DATE,
    compras_id       INTEGER NOT NULL,
    proveedores_id   INTEGER NOT NULL
);

ALTER TABLE cuenta_por_pagar ADD CONSTRAINT cuenta_por_pagar_pk PRIMARY KEY ( id );

CREATE TABLE departamentos (
    id             INTEGER NOT NULL,
    departamento   VARCHAR2(255) NOT NULL,
    created_at     TIMESTAMP,
    updated_at     TIMESTAMP,
    deleted_at     TIMESTAMP
);

ALTER TABLE departamentos ADD CONSTRAINT departamentos_pk PRIMARY KEY ( id );

CREATE TABLE deptos (
    id           INTEGER NOT NULL,
    depto        VARCHAR2(255) NOT NULL,
    created_at   TIMESTAMP,
    updated_at   TIMESTAMP,
    deleted_at   TIMESTAMP
);

ALTER TABLE deptos ADD CONSTRAINT deptos_pk PRIMARY KEY ( id );

CREATE TABLE detalle_compras (
    id              INTEGER NOT NULL,
    compras_id      INTEGER NOT NULL,
    categorias_id   INTEGER NOT NULL,
    productos_id    INTEGER NOT NULL
);

ALTER TABLE detalle_compras ADD CONSTRAINT detalle_compras_pk PRIMARY KEY ( id );

CREATE TABLE detalle_ventas (
    id              INTEGER NOT NULL,
    ventas_id       INTEGER NOT NULL,
    categorias_id   INTEGER NOT NULL,
    productos_id    INTEGER NOT NULL
);

ALTER TABLE detalle_ventas ADD CONSTRAINT detalle_ventas_pk PRIMARY KEY ( id );

CREATE TABLE empleados (
    id              INTEGER NOT NULL,
    carne           VARCHAR2(50) NOT NULL,
    fecha_ingreso   DATE NOT NULL,
    fecha_egreso    DATE,
    empleados_id    INTEGER NOT NULL,
    deptos_id       INTEGER NOT NULL,
    puestos_id      INTEGER NOT NULL,
    personas_id     INTEGER NOT NULL,
    created_at      TIMESTAMP,
    updated_at      TIMESTAMP,
    deleted_at      TIMESTAMP
);

ALTER TABLE empleados ADD CONSTRAINT empleados_pk PRIMARY KEY ( id );

CREATE TABLE estado_civil (
    id             INTEGER NOT NULL,
    estado_civil   VARCHAR2(50) NOT NULL,
    created_at     TIMESTAMP,
    updated_at     TIMESTAMP,
    deleted_at     TIMESTAMP
);

ALTER TABLE estado_civil ADD CONSTRAINT estado_civil_pk PRIMARY KEY ( id );

CREATE TABLE estado_estudio (
    id               INTEGER NOT NULL,
    estado_estudio   VARCHAR2(100) NOT NULL,
    created_at       TIMESTAMP,
    updated_at       TIMESTAMP,
    deleted_at       TIMESTAMP
);

ALTER TABLE estado_estudio ADD CONSTRAINT estado_estudio_pk PRIMARY KEY ( id );

CREATE TABLE estudios (
    id                  INTEGER NOT NULL,
    grados_id           INTEGER NOT NULL,
    carreras_id         INTEGER NOT NULL,
    titulos_id          INTEGER NOT NULL,
    institucion         VARCHAR2(255) NOT NULL,
    fecha_egreso        DATE,
    estado_estudio_id   INTEGER NOT NULL,
    created_at          TIMESTAMP,
    updated_at          TIMESTAMP,
    deleted_at          TIMESTAMP,
    personas_id         INTEGER NOT NULL
);

ALTER TABLE estudios ADD CONSTRAINT estudios_pk PRIMARY KEY ( id );

CREATE TABLE familiares (
    id               INTEGER NOT NULL,
    cui              VARCHAR2(13) NOT NULL,
    nombre1          VARCHAR2(50) NOT NULL,
    nombre2          VARCHAR2(50),
    apellido1        VARCHAR2(50) NOT NULL,
    apellido2        VARCHAR2(50),
    telefono         VARCHAR2(9) NOT NULL,
    correo           VARCHAR2(255),
    generos_id       INTEGER NOT NULL,
    parentescos_id   INTEGER NOT NULL,
    created_at       TIMESTAMP,
    updated_at       TIMESTAMP,
    deleted_at       TIMESTAMP,
    personas_id      INTEGER NOT NULL
);

ALTER TABLE familiares ADD CONSTRAINT familiares_pk PRIMARY KEY ( id );

CREATE TABLE forma_pagos (
    id   INTEGER NOT NULL
);

ALTER TABLE forma_pagos ADD CONSTRAINT forma_pagos_pk PRIMARY KEY ( id );

CREATE TABLE generos (
    id           INTEGER NOT NULL,
    genero       VARCHAR2(50) NOT NULL,
    created_at   TIMESTAMP,
    updated_at   TIMESTAMP,
    deleted_at   TIMESTAMP
);

ALTER TABLE generos ADD CONSTRAINT generos_pk PRIMARY KEY ( id );

CREATE TABLE grados (
    id           INTEGER NOT NULL,
    grado        VARCHAR2(255) NOT NULL,
    created_at   TIMESTAMP,
    updated_at   TIMESTAMP,
    deleted_at   TIMESTAMP
);

ALTER TABLE grados ADD CONSTRAINT grados_pk PRIMARY KEY ( id );

CREATE TABLE inventario (
    id              INTEGER NOT NULL,
    existencia      INTEGER NOT NULL,
    created_at      TIMESTAMP,
    updated_at      TIMESTAMP,
    deleted_at      TIMESTAMP,
    categorias_id   INTEGER NOT NULL,
    productos_id    INTEGER NOT NULL
);

ALTER TABLE inventario ADD CONSTRAINT inventario_pk PRIMARY KEY ( id );

CREATE TABLE medios (
    id           INTEGER NOT NULL,
    medio        VARCHAR2(100) NOT NULL,
    created_at   TIMESTAMP,
    updated_at   TIMESTAMP,
    deleted_at   TIMESTAMP
);

ALTER TABLE medios ADD CONSTRAINT medios_pk PRIMARY KEY ( id );

CREATE TABLE municipios (
    id                 INTEGER NOT NULL,
    municipio          VARCHAR2(255) NOT NULL,
    departamentos_id   INTEGER NOT NULL,
    created_at         TIMESTAMP,
    updated_at         TIMESTAMP,
    deleted_at         TIMESTAMP
);

ALTER TABLE municipios ADD CONSTRAINT municipios_pk PRIMARY KEY ( id );

CREATE TABLE nacionalidades (
    id             INTEGER NOT NULL,
    nacionalidad   VARCHAR2(50) NOT NULL,
    created_at     TIMESTAMP,
    updated_at     TIMESTAMP,
    deleted_at     TIMESTAMP
);

ALTER TABLE nacionalidades ADD CONSTRAINT nacionalidades_pk PRIMARY KEY ( id );

CREATE TABLE parentescos (
    id           INTEGER NOT NULL,
    parentesco   VARCHAR2(50) NOT NULL,
    created_at   TIMESTAMP,
    updated_at   TIMESTAMP,
    deleted_at   TIMESTAMP
);

ALTER TABLE parentescos ADD CONSTRAINT parentescos_pk PRIMARY KEY ( id );

CREATE TABLE personas (
    id                  INTEGER NOT NULL,
    cui                 VARCHAR2(13) NOT NULL,
    nit                 VARCHAR2(25) NOT NULL,
    afiliacion_igss     VARCHAR2(25),
    nombre1             VARCHAR2(50) NOT NULL,
    nombre2             VARCHAR2(50),
    apellido1           VARCHAR2(50) NOT NULL,
    apellido2           VARCHAR2(50),
    apellido_casada     VARCHAR2(50),
    generos_id          INTEGER NOT NULL,
    estado_civil_id     INTEGER NOT NULL,
    nacionalidades_id   INTEGER NOT NULL,
    created_at          TIMESTAMP,
    updated_at          TIMESTAMP,
    deleted_at          TIMESTAMP
);

ALTER TABLE personas ADD CONSTRAINT personas_pk PRIMARY KEY ( id );

CREATE TABLE productos (
    id              INTEGER NOT NULL,
    producto        VARCHAR2(255) NOT NULL,
    precio_compra   NUMBER NOT NULL,
    precio_venta    NUMBER NOT NULL,
    descripcion     unknown 
--  ERROR: Datatype UNKNOWN is not allowed 
   ,
    categorias_id   INTEGER NOT NULL,
    created_at      TIMESTAMP,
    updated_at      TIMESTAMP,
    deleted_at      TIMESTAMP
);

ALTER TABLE productos ADD CONSTRAINT productos_pk PRIMARY KEY ( id );

CREATE TABLE proveedores (
    id            INTEGER NOT NULL,
    telefono      VARCHAR2(9) NOT NULL,
    correo        VARCHAR2(255) NOT NULL,
    direccion     VARCHAR2(255),
    personas_id   INTEGER NOT NULL,
    created_at    TIMESTAMP,
    updated_at    TIMESTAMP,
    deleted_at    TIMESTAMP
);

ALTER TABLE proveedores ADD CONSTRAINT proveedores_pk PRIMARY KEY ( id );

CREATE TABLE puestos (
    id           INTEGER NOT NULL,
    puesto       VARCHAR2(255) NOT NULL,
    deptos_id    INTEGER NOT NULL,
    created_at   TIMESTAMP,
    updated_at   TIMESTAMP,
    deleted_at   TIMESTAMP
);

ALTER TABLE puestos ADD CONSTRAINT puestos_pk PRIMARY KEY ( id );

CREATE TABLE residencias (
    id                 INTEGER NOT NULL,
    direccion          VARCHAR2(255) NOT NULL,
    zonas_id           INTEGER NOT NULL,
    departamentos_id   INTEGER NOT NULL,
    municipios_id      INTEGER NOT NULL,
    created_at         TIMESTAMP,
    updated_at         TIMESTAMP,
    deleted_at         TIMESTAMP,
    personas_id        INTEGER NOT NULL
);

ALTER TABLE residencias ADD CONSTRAINT residencias_pk PRIMARY KEY ( id );

CREATE TABLE titulos (
    id            INTEGER NOT NULL,
    titulo        VARCHAR2(255) NOT NULL,
    carreras_id   INTEGER NOT NULL,
    created_at    TIMESTAMP,
    updated_at    TIMESTAMP,
    deleted_at    TIMESTAMP
);

ALTER TABLE titulos ADD CONSTRAINT titulos_pk PRIMARY KEY ( id );

CREATE TABLE ventas (
    id               INTEGER NOT NULL,
    serie_factura    VARCHAR2(45),
    numero_factura   VARCHAR2(45) NOT NULL,
    fecha_factura    DATE NOT NULL,
    total            NUMBER NOT NULL,
    clientes_id      INTEGER NOT NULL,
    forma_pagos_id   INTEGER NOT NULL
);

ALTER TABLE ventas ADD CONSTRAINT ventas_pk PRIMARY KEY ( id );

CREATE TABLE zonas (
    id           INTEGER NOT NULL,
    zona         VARCHAR2(2) NOT NULL,
    created_at   TIMESTAMP,
    updated_at   TIMESTAMP,
    deleted_at   TIMESTAMP
);

ALTER TABLE zonas ADD CONSTRAINT zonas_pk PRIMARY KEY ( id );

ALTER TABLE capacitaciones
    ADD CONSTRAINT capacitaciones_personas_fk FOREIGN KEY ( personas_id )
        REFERENCES personas ( id );

ALTER TABLE carreras
    ADD CONSTRAINT carreras_grados_fk FOREIGN KEY ( grados_id )
        REFERENCES grados ( id );

ALTER TABLE clientes
    ADD CONSTRAINT clientes_personas_fk FOREIGN KEY ( personas_id )
        REFERENCES personas ( id );

ALTER TABLE compras
    ADD CONSTRAINT compras_forma_pagos_fk FOREIGN KEY ( forma_pagos_id )
        REFERENCES forma_pagos ( id );

ALTER TABLE compras
    ADD CONSTRAINT compras_proveedores_fk FOREIGN KEY ( proveedores_id )
        REFERENCES proveedores ( id );

ALTER TABLE contactos
    ADD CONSTRAINT contactos_medios_fk FOREIGN KEY ( medios_id )
        REFERENCES medios ( id );

ALTER TABLE contactos
    ADD CONSTRAINT contactos_personas_fk FOREIGN KEY ( personas_id )
        REFERENCES personas ( id );

ALTER TABLE cuenta_por_cobrar
    ADD CONSTRAINT cuenta_por_cobrar_clientes_fk FOREIGN KEY ( clientes_id )
        REFERENCES clientes ( id );

ALTER TABLE cuenta_por_cobrar
    ADD CONSTRAINT cuenta_por_cobrar_ventas_fk FOREIGN KEY ( ventas_id )
        REFERENCES ventas ( id );

ALTER TABLE cuenta_por_pagar
    ADD CONSTRAINT cuenta_por_pagar_compras_fk FOREIGN KEY ( compras_id )
        REFERENCES compras ( id );

--  ERROR: FK name length exceeds maximum allowed length(30) 
ALTER TABLE cuenta_por_pagar
    ADD CONSTRAINT cuenta_por_pagar_proveedores_fk FOREIGN KEY ( proveedores_id )
        REFERENCES proveedores ( id );

ALTER TABLE detalle_compras
    ADD CONSTRAINT detalle_compras_categorias_fk FOREIGN KEY ( categorias_id )
        REFERENCES categorias ( id );

ALTER TABLE detalle_compras
    ADD CONSTRAINT detalle_compras_compras_fk FOREIGN KEY ( compras_id )
        REFERENCES compras ( id );

ALTER TABLE detalle_compras
    ADD CONSTRAINT detalle_compras_productos_fk FOREIGN KEY ( productos_id )
        REFERENCES productos ( id );

ALTER TABLE detalle_ventas
    ADD CONSTRAINT detalle_ventas_categorias_fk FOREIGN KEY ( categorias_id )
        REFERENCES categorias ( id );

ALTER TABLE detalle_ventas
    ADD CONSTRAINT detalle_ventas_productos_fk FOREIGN KEY ( productos_id )
        REFERENCES productos ( id );

ALTER TABLE detalle_ventas
    ADD CONSTRAINT detalle_ventas_ventas_fk FOREIGN KEY ( ventas_id )
        REFERENCES ventas ( id );

ALTER TABLE empleados
    ADD CONSTRAINT empleados_deptos_fk FOREIGN KEY ( deptos_id )
        REFERENCES deptos ( id );

ALTER TABLE empleados
    ADD CONSTRAINT empleados_empleados_fk FOREIGN KEY ( empleados_id )
        REFERENCES empleados ( id );

ALTER TABLE empleados
    ADD CONSTRAINT empleados_personas_fk FOREIGN KEY ( personas_id )
        REFERENCES personas ( id );

ALTER TABLE empleados
    ADD CONSTRAINT empleados_puestos_fk FOREIGN KEY ( puestos_id )
        REFERENCES puestos ( id );

ALTER TABLE estudios
    ADD CONSTRAINT estudios_carreras_fk FOREIGN KEY ( carreras_id )
        REFERENCES carreras ( id );

ALTER TABLE estudios
    ADD CONSTRAINT estudios_estado_estudio_fk FOREIGN KEY ( estado_estudio_id )
        REFERENCES estado_estudio ( id );

ALTER TABLE estudios
    ADD CONSTRAINT estudios_grados_fk FOREIGN KEY ( grados_id )
        REFERENCES grados ( id );

ALTER TABLE estudios
    ADD CONSTRAINT estudios_personas_fk FOREIGN KEY ( personas_id )
        REFERENCES personas ( id );

ALTER TABLE estudios
    ADD CONSTRAINT estudios_titulos_fk FOREIGN KEY ( titulos_id )
        REFERENCES titulos ( id );

ALTER TABLE familiares
    ADD CONSTRAINT familiares_generos_fk FOREIGN KEY ( generos_id )
        REFERENCES generos ( id );

ALTER TABLE familiares
    ADD CONSTRAINT familiares_parentescos_fk FOREIGN KEY ( parentescos_id )
        REFERENCES parentescos ( id );

ALTER TABLE familiares
    ADD CONSTRAINT familiares_personas_fk FOREIGN KEY ( personas_id )
        REFERENCES personas ( id );

ALTER TABLE inventario
    ADD CONSTRAINT inventario_categorias_fk FOREIGN KEY ( categorias_id )
        REFERENCES categorias ( id );

ALTER TABLE inventario
    ADD CONSTRAINT inventario_productos_fk FOREIGN KEY ( productos_id )
        REFERENCES productos ( id );

ALTER TABLE municipios
    ADD CONSTRAINT municipios_departamentos_fk FOREIGN KEY ( departamentos_id )
        REFERENCES departamentos ( id );

ALTER TABLE personas
    ADD CONSTRAINT personas_estado_civil_fk FOREIGN KEY ( estado_civil_id )
        REFERENCES estado_civil ( id );

ALTER TABLE personas
    ADD CONSTRAINT personas_generos_fk FOREIGN KEY ( generos_id )
        REFERENCES generos ( id );

ALTER TABLE personas
    ADD CONSTRAINT personas_nacionalidades_fk FOREIGN KEY ( nacionalidades_id )
        REFERENCES nacionalidades ( id );

ALTER TABLE productos
    ADD CONSTRAINT productos_categorias_fk FOREIGN KEY ( categorias_id )
        REFERENCES categorias ( id );

ALTER TABLE proveedores
    ADD CONSTRAINT proveedores_personas_fk FOREIGN KEY ( personas_id )
        REFERENCES personas ( id );

ALTER TABLE puestos
    ADD CONSTRAINT puestos_deptos_fk FOREIGN KEY ( deptos_id )
        REFERENCES deptos ( id );

ALTER TABLE residencias
    ADD CONSTRAINT residencias_departamentos_fk FOREIGN KEY ( departamentos_id )
        REFERENCES departamentos ( id );

ALTER TABLE residencias
    ADD CONSTRAINT residencias_municipios_fk FOREIGN KEY ( municipios_id )
        REFERENCES municipios ( id );

ALTER TABLE residencias
    ADD CONSTRAINT residencias_personas_fk FOREIGN KEY ( personas_id )
        REFERENCES personas ( id );

ALTER TABLE residencias
    ADD CONSTRAINT residencias_zonas_fk FOREIGN KEY ( zonas_id )
        REFERENCES zonas ( id );

ALTER TABLE titulos
    ADD CONSTRAINT titulos_carreras_fk FOREIGN KEY ( carreras_id )
        REFERENCES carreras ( id );

ALTER TABLE ventas
    ADD CONSTRAINT ventas_clientes_fk FOREIGN KEY ( clientes_id )
        REFERENCES clientes ( id );

ALTER TABLE ventas
    ADD CONSTRAINT ventas_forma_pagos_fk FOREIGN KEY ( forma_pagos_id )
        REFERENCES forma_pagos ( id );



-- Informe de Resumen de Oracle SQL Developer Data Modeler: 
-- 
-- CREATE TABLE                            33
-- CREATE INDEX                             0
-- ALTER TABLE                             77
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE COLLECTION TYPE                   0
-- CREATE STRUCTURED TYPE                   0
-- CREATE STRUCTURED TYPE BODY              0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE MATERIALIZED VIEW LOG             0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- REDACTION POLICY                         0
-- 
-- ORDS DROP SCHEMA                         0
-- ORDS ENABLE SCHEMA                       0
-- ORDS ENABLE OBJECT                       0
-- 
-- ERRORS                                   2
-- WARNINGS                                 0
