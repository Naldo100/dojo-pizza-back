--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.8
-- Dumped by pg_dump version 9.5.8

-- Started on 2017-08-30 09:29:08 BRT


SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12397)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2173 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 184 (class 1259 OID 18128)
-- Name: tb_member; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tb_member (
    id integer NOT NULL,
    name character varying(100) NOT NULL
);


ALTER TABLE tb_member OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 18126)
-- Name: tb_member_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_member_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tb_member_id_seq OWNER TO postgres;

--
-- TOC entry 2174 (class 0 OID 0)
-- Dependencies: 183
-- Name: tb_member_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_member_id_seq OWNED BY tb_member.id;


--
-- TOC entry 182 (class 1259 OID 18122)
-- Name: tb_pizza; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tb_pizza (
    id integer NOT NULL,
    name character varying(100) NOT NULL
);


ALTER TABLE tb_pizza OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 18120)
-- Name: tb_pizza_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_pizza_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tb_pizza_id_seq OWNER TO postgres;

--
-- TOC entry 2175 (class 0 OID 0)
-- Dependencies: 181
-- Name: tb_pizza_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_pizza_id_seq OWNED BY tb_pizza.id;


--
-- TOC entry 186 (class 1259 OID 18159)
-- Name: tb_pizza_rate; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tb_pizza_rate (
    id integer NOT NULL,
    pizza integer NOT NULL,
    member integer NOT NULL,
    rate integer NOT NULL
);


ALTER TABLE tb_pizza_rate OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 18157)
-- Name: tb_pizza_rate_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tb_pizza_rate_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tb_pizza_rate_id_seq OWNER TO postgres;

--
-- TOC entry 2176 (class 0 OID 0)
-- Dependencies: 185
-- Name: tb_pizza_rate_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tb_pizza_rate_id_seq OWNED BY tb_pizza_rate.id;


--
-- TOC entry 2034 (class 2604 OID 18131)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_member ALTER COLUMN id SET DEFAULT nextval('tb_member_id_seq'::regclass);


--
-- TOC entry 2033 (class 2604 OID 18125)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_pizza ALTER COLUMN id SET DEFAULT nextval('tb_pizza_id_seq'::regclass);


--
-- TOC entry 2035 (class 2604 OID 18162)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_pizza_rate ALTER COLUMN id SET DEFAULT nextval('tb_pizza_rate_id_seq'::regclass);


--
-- TOC entry 2163 (class 0 OID 18128)
-- Dependencies: 184
-- Data for Name: tb_member; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_member (id, name) VALUES (1, 'Alexandre');
INSERT INTO tb_member (id, name) VALUES (2, 'Bruno');
INSERT INTO tb_member (id, name) VALUES (3, 'Caio');
INSERT INTO tb_member (id, name) VALUES (4, 'Ciro');
INSERT INTO tb_member (id, name) VALUES (5, 'Douglas');
INSERT INTO tb_member (id, name) VALUES (6, 'Felipe');
INSERT INTO tb_member (id, name) VALUES (7, 'Gabriel');
INSERT INTO tb_member (id, name) VALUES (8, 'João Paulo');
INSERT INTO tb_member (id, name) VALUES (9, 'Lucas');
INSERT INTO tb_member (id, name) VALUES (10, 'Marcelo');
INSERT INTO tb_member (id, name) VALUES (11, 'Marquin');
INSERT INTO tb_member (id, name) VALUES (12, 'Paulo');
INSERT INTO tb_member (id, name) VALUES (13, 'Jeferson');


--
-- TOC entry 2177 (class 0 OID 0)
-- Dependencies: 183
-- Name: tb_member_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_member_id_seq', 13, true);


--
-- TOC entry 2161 (class 0 OID 18122)
-- Dependencies: 182
-- Data for Name: tb_pizza; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_pizza (id, name) VALUES (1, 'Escarola');
INSERT INTO tb_pizza (id, name) VALUES (2, 'Calabresa');
INSERT INTO tb_pizza (id, name) VALUES (3, 'Frango+Catupiry');
INSERT INTO tb_pizza (id, name) VALUES (4, 'Marguerita');
INSERT INTO tb_pizza (id, name) VALUES (5, 'Napolitana');
INSERT INTO tb_pizza (id, name) VALUES (6, 'Quatro Queijos');


--
-- TOC entry 2178 (class 0 OID 0)
-- Dependencies: 181
-- Name: tb_pizza_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_pizza_id_seq', 6, true);


--
-- TOC entry 2165 (class 0 OID 18159)
-- Dependencies: 186
-- Data for Name: tb_pizza_rate; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tb_pizza_rate (id, pizza, member, rate) VALUES (1, 1, 1, 5);
INSERT INTO tb_pizza_rate (id, pizza, member, rate) VALUES (2, 1, 2, 3);
INSERT INTO tb_pizza_rate (id, pizza, member, rate) VALUES (3, 2, 1, 3);


--
-- TOC entry 2179 (class 0 OID 0)
-- Dependencies: 185
-- Name: tb_pizza_rate_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tb_pizza_rate_id_seq', 3, true);


--
-- TOC entry 2039 (class 2606 OID 18156)
-- Name: pk_member; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_member
    ADD CONSTRAINT pk_member PRIMARY KEY (id);


--
-- TOC entry 2037 (class 2606 OID 18141)
-- Name: pk_pizza; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_pizza
    ADD CONSTRAINT pk_pizza PRIMARY KEY (id);


--
-- TOC entry 2041 (class 2606 OID 18164)
-- Name: pk_pizza_rate; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_pizza_rate
    ADD CONSTRAINT pk_pizza_rate PRIMARY KEY (id);


--
-- TOC entry 2043 (class 2606 OID 18176)
-- Name: unq_pizza_member; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_pizza_rate
    ADD CONSTRAINT unq_pizza_member UNIQUE (pizza, member);


--
-- TOC entry 2045 (class 2606 OID 18170)
-- Name: fk_pizza_rate_member; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_pizza_rate
    ADD CONSTRAINT fk_pizza_rate_member FOREIGN KEY (member) REFERENCES tb_member(id);


--
-- TOC entry 2044 (class 2606 OID 18165)
-- Name: fk_pizza_rate_pizza; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tb_pizza_rate
    ADD CONSTRAINT fk_pizza_rate_pizza FOREIGN KEY (pizza) REFERENCES tb_pizza(id);


--
-- TOC entry 2172 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2017-08-30 09:29:08 BRT

--
-- PostgreSQL database dump complete
--

