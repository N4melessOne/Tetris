USE [TetrisDb]
GO

/****** Object: Table [dbo].[Scores] Script Date: 2023. 01. 14. 23:32:41 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

--UNCOMMENT DROP if it is needed
--DROP TABLE [dbo].[Users];
--DROP TABLE [dbo].[Scores];

--CREATE Scores
CREATE TABLE [dbo].[Scores] (
    [Id]          INT        IDENTITY (1, 1) NOT NULL,
    [UserId]      INT        NULL,
    [Score]       INT        NULL,
    [Lines]       INT        NULL
);

--CREATE Users
CREATE TABLE [dbo].[Users] (
    [Id]       INT           IDENTITY (1, 1) NOT NULL,
    [Username] VARCHAR (255) NOT NULL,
    [Passwd]   VARCHAR (255) NOT NULL,
    [Email]    VARCHAR (255) NOT NULL
);

--INSERT Users
INSERT INTO [dbo].[Users] ([Id], [Username], [Passwd]) VALUES (1, N'L4cos', N'teszt_0');
INSERT INTO [dbo].[Users] ([Id], [Username], [Passwd]) VALUES (2, N'Z0li', N'teszt_1');
INSERT INTO [dbo].[Users] ([Id], [Username], [Passwd]) VALUES (3, N'S1di', N'teszt_2');
INSERT INTO [dbo].[Users] ([Id], [Username], [Passwd]) VALUES (4, N'B4lage', N'teszt_3');