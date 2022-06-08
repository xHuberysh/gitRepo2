/*
 Navicat Premium Data Transfer

 Source Server         : 123456
 Source Server Type    : MySQL
 Source Server Version : 80011
 Source Host           : localhost:3306
 Source Schema         : userinformation

 Target Server Type    : MySQL
 Target Server Version : 80011
 File Encoding         : 65001

 Date: 08/06/2022 14:38:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for adminindex
-- ----------------------------
DROP TABLE IF EXISTS `adminindex`;
CREATE TABLE `adminindex`  (
  `adminname` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  PRIMARY KEY (`adminname`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of adminindex
-- ----------------------------
INSERT INTO `adminindex` VALUES (2000001, 123456);

-- ----------------------------
-- Table structure for sc
-- ----------------------------
DROP TABLE IF EXISTS `sc`;
CREATE TABLE `sc`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sno` int(11) NOT NULL,
  `sname` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_vi_0900_ai_ci NOT NULL,
  `cno` int(11) NOT NULL,
  `cname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_vi_0900_ai_ci NOT NULL,
  `cteacher` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_vi_0900_ai_ci NOT NULL,
  `grade` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vi_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sc
-- ----------------------------
INSERT INTO `sc` VALUES (1, 2022001, '李立', 1, '高等数学', '赵东歌', 85);
INSERT INTO `sc` VALUES (2, 2022007, '萨达', 2, '数据结构', '赵红', 88);
INSERT INTO `sc` VALUES (3, 2022001, '李立', 5, 'c语言程序设计', '石强', 80);
INSERT INTO `sc` VALUES (4, 2022009, '小花', 3, '毛泽东思想', '高伟', 86);
INSERT INTO `sc` VALUES (5, 2022001, '李立', 4, '马克思主义', '刘云艳', 78);
INSERT INTO `sc` VALUES (6, 2022005, '晓楠', 1, '高等数学', '赵东歌', 89);
INSERT INTO `sc` VALUES (7, 2022003, '张华', 7, '离散数学', '赵红', NULL);
INSERT INTO `sc` VALUES (8, 2022001, '李立', 6, '大学英语', '何英', NULL);

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sno` int(11) NOT NULL,
  `sname` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sage` int(11) NOT NULL,
  `ssex` enum('男','女') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `smajor` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sclass` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdept` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `sno`(`sno`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (1, 2022001, '李立', 20, '男', '化学工程', '2班', '化学学院');
INSERT INTO `student` VALUES (2, 2022002, '李四', 20, '男', '信安', '1班', '网络空间安全');
INSERT INTO `student` VALUES (3, 2022003, '张华', 20, '男', '物理', '2班', '物理信息学院');
INSERT INTO `student` VALUES (4, 2022004, '美娜', 21, '女', '生物', '1班', '生物信息学院');
INSERT INTO `student` VALUES (5, 2022005, '晓楠', 19, '女', '计科', '1班', '网计学院');
INSERT INTO `student` VALUES (6, 2022006, '成成', 20, '男', '新闻传播', '1班', '新闻学院');
INSERT INTO `student` VALUES (7, 2022007, '萨达', 23, '男', '商贸', '6班', '金融学院');
INSERT INTO `student` VALUES (8, 2022008, '小记', 20, '男', '信安', '5班', '网络空间安全');
INSERT INTO `student` VALUES (9, 2022009, '小花', 19, '女', '舞蹈', '1班', '基础学院');
INSERT INTO `student` VALUES (10, 2022010, '晓华', 19, '女', '化学工程', '3班', '化学学院');
INSERT INTO `student` VALUES (11, 2022514, '肖斯豪', 19, '男', '计算机应用技术', '3班', '信息学院');

-- ----------------------------
-- Table structure for studentindex
-- ----------------------------
DROP TABLE IF EXISTS `studentindex`;
CREATE TABLE `studentindex`  (
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `useremail` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`) USING BTREE,
  UNIQUE INDEX `useremail`(`useremail`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of studentindex
-- ----------------------------
INSERT INTO `studentindex` VALUES (2022001, 123456, '23131298@qq.com');
INSERT INTO `studentindex` VALUES (2022002, 123456, '24331298@qq.com');
INSERT INTO `studentindex` VALUES (2022003, 123456, '23134298@qq.com');
INSERT INTO `studentindex` VALUES (2022004, 123456, '23111298@qq.com');
INSERT INTO `studentindex` VALUES (2022005, 123456, '23131328@qq.com');
INSERT INTO `studentindex` VALUES (2022006, 123456, '23131212@qq.com');
INSERT INTO `studentindex` VALUES (2022007, 123456, '23651298@qq.com');
INSERT INTO `studentindex` VALUES (2022008, 123456, '23176298@qq.com');
INSERT INTO `studentindex` VALUES (2022009, 123456, '23139898@qq.com');
INSERT INTO `studentindex` VALUES (2022514, 123456, '2022514@qq.com');

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cteacher` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cno` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES (1, '高等数学', '赵东歌', 1, 5);
INSERT INTO `teacher` VALUES (2, '数据结构', '赵红', 2, 4);
INSERT INTO `teacher` VALUES (3, '毛泽东思想', '高伟', 3, 3);
INSERT INTO `teacher` VALUES (4, '马克思主义', '刘云艳', 4, 3);
INSERT INTO `teacher` VALUES (5, 'c语言程序设计', '石墙', 5, 3);
INSERT INTO `teacher` VALUES (6, '大学英语', '何英', 6, 3);
INSERT INTO `teacher` VALUES (7, '离散数学', '赵红', 7, 4);
INSERT INTO `teacher` VALUES (8, '计算机英语', '陈向阳', 8, 3);
INSERT INTO `teacher` VALUES (9, '运筹学', '司键辉', 9, 5);
INSERT INTO `teacher` VALUES (10, '数字电路', '杨芳', 10, 5);

-- ----------------------------
-- Table structure for teacherindex
-- ----------------------------
DROP TABLE IF EXISTS `teacherindex`;
CREATE TABLE `teacherindex`  (
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `useremail` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teacherindex
-- ----------------------------
INSERT INTO `teacherindex` VALUES (2006001, 123456, NULL);
INSERT INTO `teacherindex` VALUES (2006002, 123456, NULL);
INSERT INTO `teacherindex` VALUES (2006003, 123456, NULL);
INSERT INTO `teacherindex` VALUES (2006004, 123456, NULL);
INSERT INTO `teacherindex` VALUES (2006005, 123456, NULL);
INSERT INTO `teacherindex` VALUES (2006006, 123456, NULL);
INSERT INTO `teacherindex` VALUES (2006007, 123456, NULL);
INSERT INTO `teacherindex` VALUES (2022008, 123456, NULL);

-- ----------------------------
-- Table structure for teacherinfo
-- ----------------------------
DROP TABLE IF EXISTS `teacherinfo`;
CREATE TABLE `teacherinfo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tno` int(11) NOT NULL,
  `tname` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tsex` enum('男','女') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tage` int(11) NOT NULL,
  `tdept` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `tno`(`tno`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teacherinfo
-- ----------------------------
INSERT INTO `teacherinfo` VALUES (1, 2006001, '石强', '男', 40, '计算机学院', 123321);
INSERT INTO `teacherinfo` VALUES (2, 2006002, '赵红', '女', 39, '计算机学院', 143321);
INSERT INTO `teacherinfo` VALUES (3, 2006003, '赵东歌', '女', 42, '数学学院', 123431);
INSERT INTO `teacherinfo` VALUES (5, 2006005, '何英', '女', 37, '英语学院', 121221);
INSERT INTO `teacherinfo` VALUES (6, 2006006, '陈向阳', '女', 37, '计算机学院', 123367);
INSERT INTO `teacherinfo` VALUES (7, 2006007, '司键辉', '男', 40, '计算机学院', 123436);
INSERT INTO `teacherinfo` VALUES (8, 2006008, '何芳', '女', 39, '计算机学院', 126231);

SET FOREIGN_KEY_CHECKS = 1;
