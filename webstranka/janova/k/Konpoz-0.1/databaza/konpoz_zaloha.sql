--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: podujatia; Type: TABLE; Schema: public; Owner: aiex; Tablespace: 
--

CREATE TABLE podujatia (
    nazov text,
    prihlaska date,
    datum date
);


ALTER TABLE public.podujatia OWNER TO aiex;

--
-- Data for Name: podujatia; Type: TABLE DATA; Schema: public; Owner: aiex
--

COPY podujatia (nazov, prihlaska, datum) FROM stdin;
aksiia	2015-02-01	2015-02-02
akcia 5	2015-12-11	2015-12-20
akce 14	2015-11-02	2015-12-20
akkce14	2015-12-15	2015-10-25
akcia 41	2015-11-15	2015-11-25
podujatie dake	2015-10-23	2015-12-15
actione	2016-01-25	2016-02-05
podujatie 1	2016-02-10	2016-03-11
daka ina akcia	2016-03-12	2015-04-10
daco daco	2015-10-12	2015-10-30
akce1	2015-12-25	2015-12-30
fgcghcfg	2015-10-14	2015-10-31
\.


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

