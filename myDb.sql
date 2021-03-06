--
-- PostgreSQL database dump
--

-- Dumped from database version 10.3 (Ubuntu 10.3-1.pgdg16.04+1)
-- Dumped by pg_dump version 10.4 (Ubuntu 10.4-1.pgdg16.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: exercises; Type: TABLE; Schema: public; Owner: hwucubbwayjfcj
--

CREATE TABLE public.exercises (
    exercise text NOT NULL,
    repetitions integer,
    sets integer
);


ALTER TABLE public.exercises OWNER TO hwucubbwayjfcj;

--
-- Name: goal; Type: TABLE; Schema: public; Owner: hwucubbwayjfcj
--

CREATE TABLE public.goal (
    id integer NOT NULL,
    notes text,
    goalweight double precision
);


ALTER TABLE public.goal OWNER TO hwucubbwayjfcj;

--
-- Name: routines; Type: TABLE; Schema: public; Owner: hwucubbwayjfcj
--

CREATE TABLE public.routines (
    routine text NOT NULL,
    date date,
    exercise text
);


ALTER TABLE public.routines OWNER TO hwucubbwayjfcj;

--
-- Name: users; Type: TABLE; Schema: public; Owner: hwucubbwayjfcj
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username text,
    password text,
    goalid integer,
    weight double precision,
    heightfeet integer,
    heightinch integer,
    routine text
);


ALTER TABLE public.users OWNER TO hwucubbwayjfcj;

--
-- Data for Name: exercises; Type: TABLE DATA; Schema: public; Owner: hwucubbwayjfcj
--

COPY public.exercises (exercise, repetitions, sets) FROM stdin;
\.


--
-- Data for Name: goal; Type: TABLE DATA; Schema: public; Owner: hwucubbwayjfcj
--

COPY public.goal (id, notes, goalweight) FROM stdin;
\.


--
-- Data for Name: routines; Type: TABLE DATA; Schema: public; Owner: hwucubbwayjfcj
--

COPY public.routines (routine, date, exercise) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: hwucubbwayjfcj
--

COPY public.users (id, username, password, goalid, weight, heightfeet, heightinch, routine) FROM stdin;
\.


--
-- Name: exercises exercises_pkey; Type: CONSTRAINT; Schema: public; Owner: hwucubbwayjfcj
--

ALTER TABLE ONLY public.exercises
    ADD CONSTRAINT exercises_pkey PRIMARY KEY (exercise);


--
-- Name: goal goal_pkey; Type: CONSTRAINT; Schema: public; Owner: hwucubbwayjfcj
--

ALTER TABLE ONLY public.goal
    ADD CONSTRAINT goal_pkey PRIMARY KEY (id);


--
-- Name: routines routines_pkey; Type: CONSTRAINT; Schema: public; Owner: hwucubbwayjfcj
--

ALTER TABLE ONLY public.routines
    ADD CONSTRAINT routines_pkey PRIMARY KEY (routine);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: hwucubbwayjfcj
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: routines routine_exercise_fkey; Type: FK CONSTRAINT; Schema: public; Owner: hwucubbwayjfcj
--

ALTER TABLE ONLY public.routines
    ADD CONSTRAINT routine_exercise_fkey FOREIGN KEY (exercise) REFERENCES public.exercises(exercise);


--
-- Name: users users_goalid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: hwucubbwayjfcj
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_goalid_fkey FOREIGN KEY (goalid) REFERENCES public.goal(id);


--
-- Name: users users_routine_fkey; Type: FK CONSTRAINT; Schema: public; Owner: hwucubbwayjfcj
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_routine_fkey FOREIGN KEY (routine) REFERENCES public.routines(routine);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: hwucubbwayjfcj
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO hwucubbwayjfcj;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO hwucubbwayjfcj;


--
-- PostgreSQL database dump complete
--

